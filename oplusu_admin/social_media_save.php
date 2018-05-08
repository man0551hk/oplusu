<?php
include("interface1.php");

$socialIDArray = $socialClass->GetSocialSettingArray();
for($i = 0; $i < sizeof($socialIDArray); $i++)
{
  if(isset($_POST["link".$socialIDArray[$i]]) && isset($_POST["icon_class".$socialIDArray[$i]]))
  {
    $link = $_POST["link".$socialIDArray[$i]];
    $icon_class = $_POST["icon_class".$socialIDArray[$i]];
    $socialClass->SaveSocialMedia($socialIDArray[$i], $link, $icon_class);
  }
}

if(isset($_POST["newlink"]) && isset($_POST["newiconclass"]) && !empty($_POST["newlink"]) && !empty($_POST["newiconclass"]))
{
  $socialClass->InsertSocialMedia( $_POST["newlink"], $_POST["newiconclass"]);
}
?>

<script>
window.location = "social_media.php";
</script>

<?php
include("interface2.php");
?>
