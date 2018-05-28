<?php
include 'interface1.php';
?>
<?php
if(isset($_GET["vendor_photo_id"]) && isset($_GET["set_id"]) && isset($_GET["vendor_id"]))
{
  $vendor_photo_id = $_GET["vendor_photo_id"];
  $vendor_id = $_GET["vendor_id"];
  $set_id = $_GET["set_id"];

  echo $vendorClass->DeleteVendorPhoto($vendor_photo_id, $vendor_id, $set_id);
}
?>
<script>
window.location = 'vendor_new.php?set_id=<?php echo $_GET["set_id"]?>&vendor_id=<?php echo $_GET["vendor_id"]?>';
</script>
<?php
include 'interface2.php';
?>
