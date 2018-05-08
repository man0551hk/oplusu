<?php
require_once("interface1.php");
?>
<div class="panel panel-default">
  <div class="panel-heading">Meta Tag Setting</div>
    <div class="panel-body">
      <form action = "meta_tag_save.php" method = "POST">
        <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
          <?php
            print $metaTagClass->GetMetaTagSetting();
          ?>
        </table>
        <input type = "submit" value = "Save" class = "btn btn-primary" />
      </form>
    </div>
  </div>
</div>

<?php
require_once("interface2.php");
?>
