<?php
include 'interface1.php';
?>

<div class="panel panel-default">
  <div class="panel-heading">News</div>
    <div class="panel-body">
      <a href = "news_detail.php" class="btn btn-primary">Create News</a>
          <?php
            echo $newsClass->GetNewsSetting();
          ?>
    </div>
  </div>
</div>
<?php
include 'interface2.php';
?>
