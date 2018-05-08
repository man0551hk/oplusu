<?php
include("interface1.php");
?>
<?php
if(isset($_GET["lang_id"]))
{
  $lang_id = $_GET["lang_id"];
  $aboutClass->DeleteAbout($lang_id);
}
?>
<script>
  window.location = "about.php?lang_id=<?php echo $lang_id;?>";
</script>
<?php
include("interface2.php");
?>
