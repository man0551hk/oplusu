<?php session_start();
include 'db.php';
include 'controller/lang_setting.inc';
include 'controller/home_setting.inc';
include 'include.php';


if($_POST['image_form_submit'] == 1)
{
	$images_arr = array();
  $result = '';
  $target_dir = '../images/'.$_POST['upload_path'];
  $save_dir = 'images/'.$_POST['upload_path'];

	foreach($_FILES['images']['name'] as $key=>$val)
  {
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$filesize 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
    $ext = end((explode(".", $image_name)));

		$newImage_name = $homeClass->GetSliderPhotoID().'.'.$ext;
		$target_file = $target_dir.'/'.$newImage_name;
    $savePath = $save_dir.'/'.$newImage_name;

		if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file))
    {
			if($filesize > 5242880)
			{
				$result .= '<font color = "red">Failed: '.$image_name." file size larger than 5MB</font><br/>";
				unlink($target_file);
			}
			else {
				$size = getimagesize($target_file);
				if ($size[0] > 1140)
				{
			  	$homeClass->createThumbnail($newImage_name,1140,641,$target_dir,$target_dir);
				}

				$images_arr[] = $target_file;
				$homeClass->SaveSliderPhoto($savePath);
			}


      /*if ($size[0] <= 2560)
      {
        $images_arr[] = $target_file;
        $homeClass->SaveSliderPhoto($savePath);
      }
      else {
        $result .= '<font color = "red">'.$image_name." width too large</font><br/>";
        unlink($target_file);
      }*/
		}

		//display images without stored
		//$extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
    	//$images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
	}

  if(!empty($result))
  {
    echo $result;
  }
	//Generate images view
	//if(!empty($images_arr))
  //{
	//echo 	$homeClass->GetSliderImage();
	//}

}
?>
