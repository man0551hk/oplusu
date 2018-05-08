<?php
include 'interface1.php';

$news_id = 0;
if(isset($_GET["news_id"]))
{
  $news_id = $_GET["news_id"];
  $newsClass->DeleteNewsCoverImage($news_id);
}
?>
<script>
window.location="news_detail.php?news_id=<?php echo $news_id;?>";
</script>
<?php
include 'interface2.php';
?>
