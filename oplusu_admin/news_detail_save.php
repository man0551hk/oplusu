<?php
include 'interface1.php';

$news_id = $_POST["news_id"];
$news_title = $_POST["news_title"];
$lang_id = $_POST["lang_id"];

echo $lang_id;
$newsClass->UpdateNewsInfo($news_id, $news_title, $lang_id);

$sectionIDArray = $newsClass->GetNewsSectionIDArray($news_id);
for($i = 0; $i < sizeof($sectionIDArray); $i++)
{
  if(isset($_POST["section".$sectionIDArray[$i]]))
  {
    $section_id = $sectionIDArray[$i];
    $content = $_POST["section".$sectionIDArray[$i]];

    $newsClass->UpdateNewsSection($section_id, $content);
  }
}

if(isset($_POST["newsection"])   )
{
  if(!empty($_POST["newsection"]))
  {
    $content = $_POST["newsection"];
    $newsClass->InsertNewsSection($news_id, $content);
  }
}

?>
<script>
window.location="news_detail.php?news_id=<?php echo $news_id;?>";
</script>
<?php
include 'interface2.php';
?>
