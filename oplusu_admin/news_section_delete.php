<?php
include 'interface1.php';

$news_id = 0;
if(isset($_GET["section_id"]))
{
  $section_id = $_GET["section_id"];
  $news_id = $_GET["news_id"];
  $newsClass->DeleteNewsSection($section_id);
}
?>
<script>
window.location="news_detail.php?news_id=<?php echo $news_id;?>";
</script>
<?php
include 'interface2.php';
?>
