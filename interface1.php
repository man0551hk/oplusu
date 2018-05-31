<?php
include '../oplusu_admin/db.php';
include '../oplusu_admin/include.php';
include '../oplusu_admin/controller/lang_setting.php';
include '../oplusu_admin/controller/menu.php';
include '../oplusu_admin/controller/metaTag_setting.php';
include '../oplusu_admin/controller/social_setting.php';
include '../oplusu_admin/controller/gallery_category_setting.php';
include '../oplusu_admin/controller/gallery_setting.php';
include '../oplusu_admin/controller/vendor_category_setting.php';
include '../oplusu_admin/controller/vendor_setting.php';

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
if(isset($_GET["vendor_id"]) || isset($_GET["vendor"]) )
{
  if(isset($_GET["vendor_id"]))
  {
    $vendor_id = $_GET["vendor_id"];
  }
  else {
    $vendor_id = $vendorClass->VendorSEOPath($_GET["vendor"]);
  }
  $project_title = $metaTagClass->GetVendorTitle($currLang_id, $vendor_id).' | ';
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
    <title><?php echo $project_title;?><?php echo $news_title;?><?php echo $subpage;?>O + U</title>

    <meta name="keywords" content="<?php echo $metaArray[0];?>">
    <meta name="description" content="<?php echo $project_title . $news_title . $metaArray[1]  ;?>">

    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/color1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/color1/css/bootstrap-touch-carousel.min.css">
    <link rel="stylesheet" href="/color1/css/ionicons.min.css?v1">
    <link rel="stylesheet" href="/color1/css/animate.min.css">
    <link rel="stylesheet" href="/color1/css/owl.carousel.min.css?v1">
    <link rel="stylesheet" href="/color1/css/owl.theme.min.css?v1">
    <link rel="stylesheet" href="/color1/css/jquery.fancybox.min.css?v1">
    <link rel="stylesheet" href="/color1/css/Fade.min.css?v1">
    <link rel="stylesheet" href="/color1/css/main.min.css?v1">
    <link rel="stylesheet" href="/color1/css/responsive.min.css?v1">
    <!--<link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="vendor/Slicebox/css/custom.css" />-->

    <script src="/color1/js/vendor/modernizr-2.6.2.min.js?v1"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/color1/js/owl.carousel.min.js?v1"></script>
    <script src="/color1/js/bootstrap.min.js?v1"></script>
    <script src="/color1/js/bootstrap-touch-carousel.js?v1"></script>
    <script src="/color1/js/wow.min.js?v1"></script>
    <script src="/color1/js/slider.js?v1"></script>
    <script src="/color1/js/jquery.fancybox.js?v1"></script>
    <script src="/color1/js/main.js?v1"></script>
    <script src="/color1/js/function.js?v1" type="text/javascript"></script>
    

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118966689-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-118966689-1');
    </script>

    <script type="text/javascript">
        (function () {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = ('https:' == document.location.protocol ? 'https://s' : 'http://i')
            + '.po.st/static/v4/post-widget.js#publisherKey=g9agm7u6al0m18m1mpqi';
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
                  <a href="/">
                        <font style = "font-family:Century Gothic;font-size: 3em;color: #a2a3a7;text-decoration:none;">O+U</font>
                      <!-- <img src="/images/logo.png" alt="O + U Logo"> -->
                  </a>
              </div>
          </div>

          <nav class="collapse navbar-collapse navbar-right" role="navigation">
              <div class="main-menu">
                  <ul class="nav navbar-nav navbar-right">
                      <?php
                        print $menuClass->GetFrontEndMenu($currLang_id, $langClass);
                      ?>
                  </ul>
              </div>
          </nav>

      </div>
  </header>
