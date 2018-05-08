<?php
include("interface1.php");
?>

<div class="panel panel-default">
  <div class="panel-heading">Social Media</div>
    <div class="panel-body">

      <a href = "https://www.po.st/" target="=_blank">Share Buttons Setting @ www.po.st</a>
      <br/><br/>
      <h3>Bottom Social Media Buttons</h3>
      <form action = "social_media_save.php" method = "POST">
        <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
            <thead>
              <tr>
                <td>Link</td>
                <td>Icon Class</td>
                <td></td>
              </tr>
            </thead>
            <?php
              echo $socialClass->GetSocialSetting();
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
