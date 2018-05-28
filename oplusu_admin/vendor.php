<?php
include("interface1.php");

?>
<div class="panel panel-default">
  <div class="panel-heading">Vendor Setting</div>
    <div class="panel-body">

      <form action = "vendor.php" method = "post">
        <div class="form-inline">
        <select name = "set_id" class = "form-control">
          <?php
            if(isset($_POST["set_id"]) || isset($_GET["set_id"]))
            {
              $set_id = $_POST["set_id"];
            }
            echo $vendorCategoryClass->ReturnCategroyDropDown($set_id);
          ?>
        </select>
        <input type = "submit" value="Search" class="btn btn-primary"/>
      </div>
      </form>

      <?php
        if(isset($_POST["set_id"]) || isset($_GET["set_id"]))
        {
          $set_id = $_POST["set_id"];
          if(!isset($_POST["set_id"]))
          {
            $set_id = $_GET["set_id"];
          }
          ?>
            <br/>
            <a href = "vendor_new.php?set_id=<?php echo $set_id; ?>" class="btn btn-success">Create New Vendor</a>
            <br/><br/>
            <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover" id = "vendor">
              <thead>
                <tr>
                  <td>
                    Vendor Name</td>
                  <td>Display Order</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <?php echo $vendorClass->GetVendorList($set_id);?>
              </tbody>
            </table>
          <?php
        }
      ?>

    </div>
  </div>
</div>
<script type="text/javascript">
  $('table tbody').sortable({
        update: function(event, ui) {

						$('table > tbody tr').each(function (i) {
								var newOrder = i +1;
								var vendor_id = $(this).attr('id');
                var set_id = $(this).attr('setid');
                //onsole.log(vendor_id, set_id, newOrder);
								$("#dorder" + vendor_id).html(newOrder);

								SaveOrder(vendor_id, set_id, newOrder);
								//console.log($(this).attr('id'));
						    //console.log($(this).attr('id')); // use $(this) as a reference to current tr object
						});
        },
        start: function(event, ui) {
            //console.log('start: ' + ui.item.index())
        }
    });
		function SaveOrder(vendor_id, set_id, dorder)
		{
			$.ajax({
			  url: "vendor_order.php?vendor_id=" + vendor_id + "&set_id=" + set_id  + "&dorder=" + dorder
			})
			  .done(function( msg ) {
			    console.log( "Data Saved");
			  });
		}
</script>
<?php
include("interface2.php");
?>
