<?php
include("interface1.php");

if(isset($_GET["section_set_id"]) && isset($_GET["set_id"]) && isset($_GET["project_id"]))
{
  $set_id = $_GET["set_id"];
  $project_id = $_GET["project_id"];

?>
<script>
  window.location = 'gallery_new.php?set_id=<?php echo $set_id;?>&project_id=<?php echo $project_id;?>';
</script>
<?php
}
include("interface2.php");
?>
