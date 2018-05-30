<?php
include("interface1.php");

if(isset($_GET["section_set_id"]) && isset($_GET["set_id"]) && isset($_GET["vendor_id"]))
{
  $set_id = $_GET["set_id"];
  $vendor_id = $_GET["vendor_id"];
  $section_set_id = $_GET["section_set_id"];
  $vendorClass->DeleteVendorSection($section_set_id);
?>
<script>
  window.location = 'vendor_new.php?set_id=<?php echo $set_id;?>&vendor_id=<?php echo $vendor_id;?>';
</script>
<?php
}
include("interface2.php");
?>
