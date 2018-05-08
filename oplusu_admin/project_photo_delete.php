<?php
include 'interface1.php';
?>
<?php
if(isset($_GET["project_photo_id"]) && isset($_GET["set_id"]) && isset($_GET["project_id"]))
{
  $project_photo_id = $_GET["project_photo_id"];
  $project_id = $_GET["project_id"];
  $set_id = $_GET["set_id"];

  echo $galleryClass->DeleteProjectPhoto($project_photo_id, $project_id, $set_id);
}
?>
<script>
window.location = 'gallery_new.php?set_id=<?php echo $_GET["set_id"]?>&project_id=<?php echo $_GET["project_id"]?>';
</script>
<?php
include 'interface2.php';
?>
