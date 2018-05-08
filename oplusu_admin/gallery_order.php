<?php
include("interface1.php");

?>
<?php
if(isset($_GET["project_id"]) && isset($_GET["set_id"]) && isset($_GET["dorder"]))
{
    $galleryClass->UpdateDorder($_GET["project_id"], $_GET["set_id"], $_GET["dorder"]);
}
?>
<?php
include("interface2.php");

?>
