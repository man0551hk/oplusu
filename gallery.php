<?php
include("interface1.php");

?>
<link rel="stylesheet" href="/js/vendor/isotope/css/styles.css">
<script src="/js/vendor/isotope/js/isotope.min.js"></script>
<script src="/js/vendor/isotope/js/main.js"></script>
<section class="filter-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            		<div class="filter-container isotopeFilters">
                    <ul class="list-inline filter">
                        <li class="active"><a href="#" data-filter="*">
                          <?php
                            if($currLang_id == 1)
                            {
                              ?>All <?php
                            }
                            else if($currLang_id == 2)
                            {
                              ?>所有項目 <?php
                            }
                            else if($currLang_id == 3)
                            {
                              ?>所有项目 <?php
                            }
                            else if($currLang_id == 4)
                            {
                              ?>All <?php
                            }
                            else if($currLang_id == 5)
                            {
                              ?>All <?php
                            }
                           ?>
                         </a><span>|</span></li>
                        <?php
                          echo $galleryCategoryClass->GalleryCategory($currLang_id);
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="portfolio-section port-col">
    <div class="container">
        <div class="row">
            <div class="isotopeContainer wow fadeInUp animated" data-wow-duration="100ms" data-wow-delay="0.3s">

                <?php echo $galleryClass->GetProject($currLang_id);?>
            </div>
        </div>
    </div>
</section>
<?php
include("interface2.php");
?>
