<?php
include("interface1.php");
?>
<?php
if(isset($_GET["set_id"]))
{
  $set_id = $_GET["set_id"];
  $galleryCategoryClass->DeleteGalleryCategory($set_id);
}

?>

<script>
window.location = "gallery_category.php";
</script>

<?php
include("interface2.php");
?>
