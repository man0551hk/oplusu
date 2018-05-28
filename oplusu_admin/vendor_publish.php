<?php
include("interface1.php");

if(isset($_POST["set_id"]) && isset($_POST["vendor_id"]))
{
  $set_id = $_POST["set_id"];
  $vendor_id = $_POST["vendor_id"];
  $action = $_POST["action"];

  $vendorClass->SaveVendorStatus($vendor_id, $action);

?>
<script>
window.location = 'vendor_new.php?set_id=<?php echo $set_id;?>&vendor_id=<?php echo $vendor_id;?>';
</script>
<?php
}
include("interface2.php");
?>
