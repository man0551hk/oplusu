<?php
include("interface1.php");
include 'oplusu_admin/controller/news_setting.php';
?>
<script src="/js/vendor/masonry/masonry.pkgd.min.js"></script>
<script>
  $(function(){
    $('.masonry').masonry({
      itemSelector: '.item'
    });
  });
</script>

<section id="works" class="works">
    <div class="container-fluid">
        <div class="row masonry">
          <?php
            echo $newsClass->GetNews($currLang_id);
          ?>
        </div>
    </div>
</section>
<?php
include("interface2.php");
?>
