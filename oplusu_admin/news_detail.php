<?php
include 'interface1.php';
$news_id = 0;
if(!isset($_GET["news_id"]))
{
  $news_id = $newsClass->CreateNews();
  ?>
  <script>
    window.location = 'news_detail.php?news_id=<?php echo $news_id?>';
  </script>
  <?php
}
else {
  $news_id = $_GET["news_id"];
  $news = $newsClass->GetNewsInfo($news_id);
}
?>

<script src="ckeditor.js"></script>

  <div class="panel panel-default">
    <div class="panel-body">

      <?php echo $news[2];?><br/><br/>

      <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="news_upload.php">
        <input type="hidden" name="image_form_submit" value="1"/>
        <input type="hidden" name="upload_path" value="news"/>
        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>"/>
          <label>Choose Cover Image</label>
          <input type="file" name="images" id="images" >
          <input type ="submit" values="Upload" class="btn btn-primary">
          <br/><br/>
      </form>

      <form action = "news_detail_save.php" method="POST">
        <input type = "hidden" value = "<?php echo $news_id;?>" name ="news_id" >
        <div class="row">
          <div class = "col-md-12" style="padding-bottom:5px;">
            <img src = "../<?php echo $news[3];?>" class="img-responsive"/>
            <a href = "news_delete_photo.php?news_id=<?php echo $news_id;?>" class="btn btn-danger">Delete Cover Photo</a>
          </div>
        </div>
        <div class="row">
          <div class = "col-md-12" style="padding-bottom:5px;">
            <input type = "text" name ="news_title" value = "<?php echo $news[0];?>" class="form-control" placeholder="News title">
          </div>
        </div>
        <div class="row">
          <div class = "col-md-12 form-inline" style="padding-bottom:5px;">
            Language
            <select name = "lang_id" class="form-control" placeholder="Language">
              <?php echo $news[1];?>
            </select>
          </div>
        </div>

        <?php
          echo $newsClass->GetNewsDetail($news_id);
        ?>
        <div class="row">
          <div class = "col-md-12 form-inline" style="padding-bottom:5px;">
            <input type="submit" value ="Save" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
  </div>

<?php
include 'interface2.php';
?>
