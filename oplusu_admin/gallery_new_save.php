<?php
include("interface1.php");

if(isset($_POST["set_id"]) && isset($_POST["project_id"]))
{
  $set_id = $_POST["set_id"];
  $project_id = $_POST["project_id"];
  $seopath = $_POST["seopath"];

  $ProjectSectionIDArray =  $galleryClass->GetProjectSectionIDArray($project_id);

  for($i = 0; $i < sizeof($ProjectSectionIDArray); $i++)
  {
    $content = $_POST["section".$ProjectSectionIDArray[$i]];
    $galleryClass->UpdateProjectSection($content, $ProjectSectionIDArray[$i]);
  }

  $ProjectTitleIDArray =  $galleryClass->GetProjectTitleIDArray($project_id);
  for($i = 0; $i < sizeof($ProjectTitleIDArray); $i++)
  {
    $project_title = $_POST["project_title".$ProjectTitleIDArray[$i]];
    if($_POST["seopath"] == "" && $i == 0)
    {
      if($project_title == "")
      {
        $seopath = $project_id;
      }
      else
      {
        $seopath = $project_title;
      }
    }
    $galleryClass->SaveProjectTitle($project_title, $project_id, $ProjectTitleIDArray[$i]);
  }

  $langIDArray = $langClass->GetLangIDArray();


  $allowInsert = true;
  $emptyCheck = 0;
  for($i = 0; $i< sizeof($langIDArray); $i++)
  {

    if($_POST["newSection".$langIDArray[$i]] == '')
    {
      $emptyCheck += 1;
    }
  }
  if($emptyCheck == sizeof($langIDArray))
  {
    $allowInsert = false;
  }

  if($allowInsert == true)
  {
    $section_set_id = $galleryClass->InsertSection($project_id);
    for($i = 0; $i < sizeof($langIDArray); $i++)
    {
      $content = $_POST["newSection".$langIDArray[$i]];

      $galleryClass->InsertProjectSection($content, $project_id, $section_set_id, $langIDArray[$i]);
    }
  }

  $seopath = strtolower(str_replace(" " , "-", $seopath));
  $galleryClass->UpdateProjectSEOPath($project_id, $seopath);
?>
<script>
window.location = 'gallery_new.php?set_id=<?php echo $set_id;?>&project_id=<?php echo $project_id;?>';
</script>
<?php
}
include("interface2.php");
?>
