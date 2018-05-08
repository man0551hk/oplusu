<?php
include("interface1.php");

?>
<div class="panel panel-default">
  <div class="panel-heading">Gallery Category Setting</div>
    <div class="panel-body">
      <form action = "gallery_category_save.php" method = "post">
        <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
          <?php echo $galleryCategoryClass->GetGalleryCategorySetting();?>
        </table>
        <input type = "submit" value = "save" class="btn btn-primary" />
      </form>
    </div>
  </div>
</div>
<?php
include("interface2.php");
?>
