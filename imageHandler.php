<?php
	$imagePath = $_GET['imagePath'];
	$imagePath = str_replace(" ","%20",$imagePath);
	//$imagePath = str_replace("&","%26",$imagePath);
	$new_width = isset($_GET['new_width']) ? $_GET['new_width'] : 0;
	$new_height = isset($_GET['new_height']) ? $_GET['new_height'] : 0;

	$imageInfo = getimagesize($imagePath);
 	$memoryNeeded = round(($imageInfo[0] * $imageInfo[1] * $imageInfo['bits'] * $imageInfo['channels'] / 8 + Pow(2,16)) * 1.65);
 	if (function_exists('memory_get_usage')) {
 		$memCal = (integer) ini_get('memory_limit') + ceil(((memory_get_usage() + $memoryNeeded) - (integer) ini_get('memory_limit') * pow(1024, 2)) / pow(1024, 2));
 		$nearestMemCal = pow(2, ceil(log((integer) ini_get('memory_limit') + ceil(((memory_get_usage() + $memoryNeeded) - (integer) ini_get('memory_limit') * pow(1024, 2)) / pow(1024, 2)),2)));
 		$memIni = $nearestMemCal;
 		$memIni = max($memCal+memory_get_usage(), $nearestMemCal);
 		ini_set('memory_limit', $memIni . 'M');
 	}
	//ini_set('memory_limit', '256M');
	// Content type
 	$file = 'imageHandler.php';
 	$last_modified_time = filemtime($file);
 	$etag = md5_file($file);

 	header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT");
 	header("Etag: $etag");
 	header('Pragma: public');
 	header('Cache-Control: max-age=2592000');
 	header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time()+2592000));
	header('Content-type: image/jpeg');
	header('Access-Control-Allow-Origin: *');
	// Get new dimensions
	list($width, $height, $type) = getimagesize($imagePath);
	if($new_width!=0) {
		$ratio = $width/$height;
		if( $ratio > 1) {
			$new_width = $new_width;
			$new_height = $new_width/$ratio;
		}
		else {
			$new_width = $new_height*$ratio;
			$new_height = $new_height;
		}
	} else {
		$new_width = $width;
		$new_height = $height;
	}
	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);

	switch($type) {
		case IMAGETYPE_JPEG:
			$image = imagecreatefromjpeg($imagePath);
			break;
		case IMAGETYPE_GIF:
			$image = imagecreatefromgif($imagePath);
			break;
		case IMAGETYPE_PNG:
			$image = imagecreatefrompng($imagePath);
			break;
		default:
			throw new Exception('This file is not in JPG, GIF, or PNG format!');
	}
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	// Output
	imagejpeg($image_p, null, 75);
	imagedestroy($image_p);
?>
