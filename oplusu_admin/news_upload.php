<?php session_start();
include 'db.php';
include 'controller/lang_setting.inc';
include 'controller/home_setting.inc';
include 'controller/news_setting.inc';
include 'include.php';


if($_POST['image_form_submit'] == 1)
{
	$news_id = $_POST["news_id"];

	$images_arr = array();
  $result = '';
  $target_dir = '../images/'.$_POST['upload_path'].'/'.$news_id;
  $save_dir = 'images/'.$_POST['upload_path'].'/'.$news_id;

	if(!file_exists($target_dir)){
		mkdir($target_dir);
	}
	if(file_exists($target_file)){
		unlink($target_file);
	}

	$image_name = $_FILES['images']['name'];
	$tmp_name 	= $_FILES['images']['tmp_name'];
	$filesize 		= $_FILES['images']['size'];
	$type 		= $_FILES['images']['type'];
	$error 		= $_FILES['images']['error'];
	$ext = end((explode(".", $image_name)));

	$newImage_name = $news_id.'.'.$ext;
	$target_file = $target_dir.'/'.$newImage_name;
	$savePath = $save_dir.'/'.$newImage_name;

	if(move_uploaded_file($_FILES['images']['tmp_name'],$target_file))
	{
		if($filesize > 5242880)
		{
			$result .= '<font color = "red">Failed: '.$image_name." file size larger than 5MB</font><br/>";
			unlink($target_file);
		}
		else
		{
			$size = getimagesize($target_file);

			if ($size[0] > 1140)
			{
				$homeClass->createThumbnail($newImage_name,1140,641,$target_dir,$target_dir);
			}

			$newsClass->SaveNewsCoverPhoto($news_id, $savePath);
		}

	}
}
?>
<script>
window.location = "news_detail.php?news_id=<?php echo $news_id;?>";
</script>
