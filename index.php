<?php 
include './oplusu_admin/db.php';
include './oplusu_admin/controller/lang_setting.php';
$currLang_id = $langClass->GetCookieLang();
$langCode = $langClass->GetLangCode($currLang_id);
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
<style>
    a {
        color: #a2a3a7;
    }
    a:hover {
        color: #64683A;
    }
</style>

    <div class="container" style="height:90vh;">
        <div class="row" style="top:36%; position:relative;">
            <div class="col-md-12" style="text-align:center;font-family:Century Gothic;font-size: 18em;color: #a2a3a7;text-decoration:none;">
                <?php 
                    if (strtolower($langCode)!= "zh")
                    {
                        ?>
                            <a href = '<?php echo strtolower($langCode);?>/project/' >O</a> + <a href = '<?php echo strtolower($langCode);?>/vendor/'>U</a>
                        <?php
                    }
                    else 
                    {
                        ?>
                            <a href = '/project/' >O</a> + <a href = '/project/'>U</a>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>



</body>
</html>
