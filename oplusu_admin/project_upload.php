<?php session_start();
include 'db.php';
include 'controller/lang_setting.inc';
include 'controller/home_setting.inc';
include 'controller/gallery_setting.inc';
include 'include.php';


if($_POST['image_form_submit'] == 1)
{
	$set_id = $_POST["set_id"];
	$project_id = $_POST["project_id"];



	$images_arr = array();
  $result = '';
  $target_dir = '../images/'.$_POST['upload_path'].'/'.$project_id;
  $save_dir = 'images/'.$_POST['upload_path'].'/'.$project_id;

	if(!file_exists($target_dir)){
		mkdir($target_dir);
	}

	foreach($_FILES['images']['name'] as $key=>$val)
  {
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$filesize 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
    $ext = end((explode(".", $image_name)));

		$newImage_name = $galleryClass->GetProjectPhotoID().'.'.$ext;
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
				$galleryClass->SaveProjectPhoto($savePath, $project_id);
			}

		}
	}

  if(!empty($result))
  {
    echo $result;
  }
	else {
		echo $project_id;
	}
	//Generate images view
	//if(!empty($images_arr))
  //{
	//echo 	$homeClass->GetSliderImage();
	//}

}
?>
