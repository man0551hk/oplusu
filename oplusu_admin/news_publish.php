<?php
include 'interface1.php';

$news_id = $_GET["news_id"];
$action = $_GET["action"];
$newsClass->PublishNews($news_id, $action);

?>
<script>
window.location="news_detail.php?news_id=<?php echo $news_id;?>";
</script>
<?php
include 'interface2.php';
?>
