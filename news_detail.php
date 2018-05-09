<?php
include("interface1.php");
include 'oplusu_admin/controller/news_setting.php';

if(isset($_GET["news_id"]))
{
  $news_id = $_GET["news_id"];
  $news = $newsClass->News($news_id);
}
?>
<section class="single-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-img">
                  <img class="img-responsive" alt="" src="/<?php echo $news[0]; ?>">
                </div>
                <div class="post-content">
                      <div class="pw-server-widget" data-id="wid-6ntvo8g8"></div>
                      <?php
                        echo $news[1];
                      ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("interface2.php");
?>
