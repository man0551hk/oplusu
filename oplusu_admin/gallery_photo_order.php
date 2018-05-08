<?php
include("interface1.php");

?>
<?php
if(isset($_GET["project_photo_id"]) && isset($_GET["project_id"]) && isset($_GET["dorder"]))
{
  echo "here".$_GET["project_photo_id"]." ".$_GET["project_id"]." ".$_GET["dorder"];
  $project_photo_id = $_GET["project_photo_id"];
  $project_id = $_GET["project_id"];
  $dorder = $_GET["dorder"];
  
    mysqli_query($link, "update project_photo set dorder = '$dorder' where project_photo_id = '$project_photo_id' and project_id = '$project_id'") or die (mysql_error());
}
?>
<?php
include("interface2.php");

?>
