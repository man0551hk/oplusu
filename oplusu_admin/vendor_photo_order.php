<?php
include 'db.php';
include 'controller/gallery_setting.php';
?>
<?php
if(isset($_GET["vendor_photo_id"]) && isset($_GET["vendor_id"]) && isset($_GET["dorder"]))
{
  echo "here".$_GET["vendor_photo_id"]." ".$_GET["vendor_id"]." ".$_GET["dorder"];
  $vendor_photo_id = $_GET["vendor_photo_id"];
  $vendor_id = $_GET["vendor_id"];
  $dorder = $_GET["dorder"];
  $link = $connectionClass->ConnectDB();
  mysqli_query($link, "update vendor_photo set dorder = '$dorder' where vendor_photo_id = '$vendor_photo_id' and vendor_id = '$vendor_id'") or die (mysqli_error());
}
?>
