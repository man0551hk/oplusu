<?php
include 'interface1.php';
?>

<div class="panel panel-default">
  <div class="panel-heading">Menu Setting</div>
    <div class="panel-body">
      <form action = "menu_save.php" method = "POST">

          <?php
            print $menuClass->GetMenuSetting();
          ?>

        <input type = "submit" value = "Save" class = "btn btn-primary" />
      </form>
    </div>
  </div>
</div>
<?php
include 'interface2.php';
?>
