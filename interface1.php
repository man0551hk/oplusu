<?php
include 'oplusu_admin/db.php';
include 'oplusu_admin/include.php';
include 'oplusu_admin/controller/lang_setting.inc';
include 'oplusu_admin/controller/menu.inc';
include 'oplusu_admin/controller/metaTag_setting.inc';
include 'oplusu_admin/controller/social_setting.inc';
include 'oplusu_admin/controller/gallery_category_setting.inc';
include 'oplusu_admin/controller/gallery_setting.inc';
$langClass = new LangClass();
$currLang_id = $langClass->GetCookieLang();

$subpage = $metaTagClass->GetPageName($_SERVER["REQUEST_URI"], $currLang_id);

if(isset($_GET["project_id"]) || isset($_GET["project"]) )
{
  if(isset($_GET["project_id"]))
  {
    $project_id = $_GET["project_id"];
  }
  else {
    $project_id = $galleryClass->ProjectSEOPath($_GET["project"]);
  }
  $project_title = $metaTagClass->GetProjectTitle($currLang_id, $project_id).' | ';
}
if(isset($_GET["news_id"]))
{
  $news_title = $metaTagClass->GetNewsTitle($_GET["news_id"]).' | ';
}
$metaArray = $metaTagClass->GetMetaTag($currLang_id);
?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <title><?php echo $project_title;?><?php echo $news_title;?><?php echo $subpage;?>BC&D International Limited</title>

    <meta name="keywords" content="<?php echo $metaArray[0];?>">
    <meta name="description" content="<?php echo $project_title . $news_title . $metaArray[1]  ;?>">

    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-touch-carousel.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css?v1">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css?v1">
    <link rel="stylesheet" href="/css/owl.theme.min.css?v1">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css?v1">
    <link rel="stylesheet" href="/css/Fade.min.css?v1">
    <link rel="stylesheet" href="/css/main.min.css?v1">
    <link rel="stylesheet" href="/css/responsive.min.css?v1">
    <!--<link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/custom.css" />-->

    <script src="/js/vendor/modernizr-2.6.2.min.js?v1"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/owl.carousel.min.js?v1"></script>
    <script src="/js/bootstrap.min.js?v1"></script>
    <script src="/js/bootstrap-touch-carousel.js?v1"></script>
    <script src="/js/wow.min.js?v1"></script>
    <script src="/js/slider.js?v1"></script>
    <script src="/js/jquery.fancybox.js?v1"></script>
    <script src="/js/main.js?v1"></script>
    <script src="/js/function.js?v1" type="text/javascript"></script>
    

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-92039009-1', 'auto');
      ga('send', 'pageview');

    </script>
    <script type="text/javascript">
        (function () {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = ('https:' == document.location.protocol ? 'https://s' : 'http://i')
              + '.po.st/static/v4/post-widget.js#publisherKey=n3r2esk4q4ko7c6rvhu7';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
         })();
    </script>
</head>
<body>
  <header id="top-bar" class="navbar-fixed-top animated-header">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>


              <div class="navbar-brand">
                  <a href="/" >
                      <img src="/images/logo.png" alt="BC & D Logo">
                  </a>
              </div>
          </div>

          <nav class="collapse navbar-collapse navbar-right" role="navigation">
              <div class="main-menu">
                  <ul class="nav navbar-nav navbar-right">
                      <?php
                        print $menuClass->GetFrontEndMenu($currLang_id);
                      ?>
                  </ul>
              </div>
          </nav>

      </div>
  </header>
