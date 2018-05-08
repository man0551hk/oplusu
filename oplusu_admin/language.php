<?php
include("interface1.php");

?>
<div class="row">
  <div class="col-lg-12">

    <div class="panel panel-default">
      <div class="panel-heading">Language Setting</div>
        <div class="panel-body">
          <form method = "POST" action = "language_save.php">
          <table data-toggle="table" id="table-style" data-row-style="rowStyle">
            <thead>
            <tr>
                <th>Lang ID</th>
                <th>Lang Code</th>
                <th>Display Name</th>
                <th>Open</th>
            </tr>
            </thead>

                <?php
                print $langClass->GetLangSetting();
                ?>

          </table>
          <input type = 'submit' value = 'Save' class = "btn btn-primary"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!--/.row-->
<script>
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                    classes: classes,
                    striped: $('#striped').prop('checked')
                });
        });
    });

    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
</script>
<?php
include("interface2.php");
?>
