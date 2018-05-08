<?php
include("interface1.php");

?>
<script src="ckeditor.js"></script>
<div class="panel panel-default">
  <div class="panel-heading">About Page Setting</div>
    <div class="panel-body">

      <form action = "about.php" method="POST">
        <div class="form-inline">
          <select name = "lang_id" class = "form-control">
          <?php echo $langClass->LangDropDown($_POST["lang_id"]); ?>
          </select>
          <input type = "submit" class = "btn btn-primary" value = "Search">
        </div>
      </form>

      <?php if(isset($_POST["lang_id"]) || isset($_GET["lang_id"]))
      {
        $lang_id = $_POST["lang_id"];
        if(!isset($_POST["lang_id"]))
        {
          $lang_id = $_GET["lang_id"];
        }
        ?>
        <form action = "about_save.php" method = "POST">

          <?php
            echo $aboutClass->GetAboutSetting($lang_id);
          ?>
          <div class="row">
              <div class="col-md-12">
                  <input type = "submit" value = "Save" class = "btn btn-primary" />
              <div>
          </div>
        </form>
        <?php
      } ?>

    </div>
  </div>
</div>
<?php
include("interface2.php");
?>
