<?php
include 'interface1.php';
?>
<?php
if(isset($_GET["photo_id"]))
{
  $homeClass->DeleteSliderPhoto($_GET["photo_id"]);
}
?>
<script>
window.location = "home.php";
</script>
<?php
include 'interface2.php';
?>
