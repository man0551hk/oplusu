<?php
include("interface1.php");
?>

<div class="panel panel-default">
  <div class="panel-heading">Contact Page Setting</div>
    <div class="panel-body">
      <form action = "contact_save.php" method = "POST">
        <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
          <?php
            print $ContactInfoClass->GetContactInfoSetting();
          ?>
        </table>
        <input type = "submit" value = "Save" class = "btn btn-primary" />
      </form>
    </div>
  </div>
</div>
<?php
include("interface2.php");
?>
