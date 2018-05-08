<?php
include("interface1.php");

if(isset($_GET["project_id"]) || isset($_GET["project"]))
{

  if(isset($_GET["project_id"]))
  {
    $project_id = $_GET["project_id"];
  }
  else {
    $project_id = $galleryClass->ProjectSEOPath($_GET["project"]);
  }

  $resultSet = $galleryClass->GalleryDetail($currLang_id, $project_id);

  if($_GET["allprojectson"] == "1")
  {
    echo "a";
  }


  if(sizeof($resultSet) == 0)
  {
    ?>
    <script>//window.location="index.php";</script>
    <?php
  }
?>
<section class="single-post">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="post-img">
          <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
                <?php echo $resultSet[1];?>
              </div>
              <a class="fancybox-nav fancybox-prev" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="fancybox-nav fancybox-next" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="post-content">
                      <div class="pw-server-widget" data-id="wid-6ntvo8g8"></div>
            <?php echo $resultSet[2];?>
            <br/>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
}
include("interface2.php");
?>
