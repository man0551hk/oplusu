<?php
include 'interface1.php';
include './oplusu_admin/controller/about_setting.php';
?>
<section class="company-description">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="block">
                <?php 
                    echo $aboutClass->GetAbout($currLang_id);
                ?>
              </div>
          </div>
        </div>
    </div>
</section>
<?php
include("interface2.php");
?>
