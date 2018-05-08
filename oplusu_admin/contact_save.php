<?php
include("interface1.php");
?>
<?php

print $ContactInfoClass->SaveAddress();

if (isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["email2"]) && isset($_POST["lat"]) && isset($_POST["lon"]) )
{
  $ContactInfoClass->SaveContactSetting($_POST["email"], $_POST["phone"], $_POST["email2"], $_POST["lat"], $_POST["lon"]);
}
?>
<script>
window.location = "contact.php";
</script>
<?php
include("interface2.php");
?>
