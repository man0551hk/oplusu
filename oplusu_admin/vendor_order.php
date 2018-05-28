<?php
include("interface1.php");

?>
<?php
if(isset($_GET["vendor_id"]) && isset($_GET["set_id"]) && isset($_GET["dorder"]))
{
    $vendorClass->UpdateDorder($_GET["vendor_id"], $_GET["set_id"], $_GET["dorder"]);
}
?>
<?php
include("interface2.php");

?>
