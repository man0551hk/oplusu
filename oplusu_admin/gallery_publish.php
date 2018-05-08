<?php
include("interface1.php");

if(isset($_POST["set_id"]) && isset($_POST["project_id"]))
{
  $set_id = $_POST["set_id"];
  $project_id = $_POST["project_id"];
  $action = $_POST["action"];

  $galleryClass->SaveGalleryStatus($project_id, $action);

?>
<script>
window.location = 'gallery_new.php?set_id=<?php echo $set_id;?>&project_id=<?php echo $project_id;?>';
</script>
<?php
}
include("interface2.php");
?>
