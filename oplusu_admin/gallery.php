<?php
include("interface1.php");

?>
<div class="panel panel-default">
  <div class="panel-heading">Gallery Setting</div>
    <div class="panel-body">

      <form action = "gallery.php" method = "post">
        <div class="form-inline">
        <select name = "set_id" class = "form-control">
          <?php
            if(isset($_POST["set_id"]) || isset($_GET["set_id"]))
            {
              $set_id = $_POST["set_id"];
            }
            echo $galleryCategoryClass->ReturnCategroyDropDown($set_id);
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
            <a href = "gallery_new.php?set_id=<?php echo $set_id; ?>" class="btn btn-success">Create New Project</a>
            <br/><br/>
            <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover" id = "gallery">
              <thead>
                <tr>
                  <td>Project Name</td>
                  <td>Display Order</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <?php echo $galleryClass->GetGalleryList($set_id);?>
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
								var project_id = $(this).attr('id');
                var set_id = $(this).attr('setid');
                //onsole.log(project_id, set_id, newOrder);
								$("#dorder" + project_id).html(newOrder);

								SaveOrder(project_id, set_id, newOrder);
								//console.log($(this).attr('id'));
						    //console.log($(this).attr('id')); // use $(this) as a reference to current tr object
						});
        },
        start: function(event, ui) {
            //console.log('start: ' + ui.item.index())
        }
    });
		function SaveOrder(project_id, set_id, dorder)
		{
			$.ajax({
			  url: "gallery_order.php?project_id=" + project_id + "&set_id=" + set_id  + "&dorder=" + dorder
			})
			  .done(function( msg ) {
			    console.log( "Data Saved");
			  });
		}
</script>
<?php
include("interface2.php");
?>
