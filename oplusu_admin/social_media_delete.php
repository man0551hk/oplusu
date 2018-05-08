<?php
include("interface1.php");


  if(isset($_GET["id"]) )
  {

    $socialClass->DeleteSocialMedia($_GET["id"]);
  }

?>

<script>
window.location = "social_media.php";
</script>

<?php
include("interface2.php");
?>
