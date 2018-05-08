<?php
include("interface1.php");
?>
<?php
if(isset($_POST["lang_id"]))
{
  $lang_id = $_POST["lang_id"];

  if(isset($_POST["newTitle"]) && isset($_POST["newContent"]) && strlen($_POST["newContent"]))
  {
    $newTitle = $_POST["newTitle"];
    $newContent = $_POST["newContent"];
    $aboutClass->InsertAbout($newTitle, $newContent, $lang_id);
  }

  $aboutIDArray = $aboutClass->ReturnAboutID();

  for($i = 0; $i < sizeof($aboutIDArray); $i++)
  {
    echo $aboutIDArray[$i];
    if(isset($_POST["title".$aboutIDArray[$i]]) && isset($_POST["content".$aboutIDArray[$i]]))
    {
      $aboutClass->UpdateAbout($_POST["title".$aboutIDArray[$i]], $_POST["content".$aboutIDArray[$i]], $aboutIDArray[$i]);
    }
  }
}
?>
<script>
  window.location = "about.php?lang_id=<?php echo $lang_id;?>";
</script>
<?php
include("interface2.php");
?>
