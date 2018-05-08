<?php
include 'interface1.php';
?>
<?php
if(isset($_GET["photo_id"]) && isset( $_GET["dorder"]))
{
  $photo_id = $_GET["photo_id"];
  $dorder = $_GET["dorder"];
  $homeClass->SavePhotoOrder($photo_id, $dorder);
}
else {
  ?>

  <?php
}
?>
<?php
include 'interface2.php';
?>
