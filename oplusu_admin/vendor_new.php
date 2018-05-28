<?php
include("interface1.php");

if(isset($_GET["set_id"]))
{
  $set_id = $_GET["set_id"];
  $vendor_id = 0;
  if(isset($_GET["vendor_id"]))
  {
    $vendor_id = $_GET["vendor_id"];
  }

  if($vendor_id == 0)
  {
    $vendor_id = $vendorClass->InsertVendor($set_id);
    ?>
    <script>window.location='vendor_new.php?set_id=<?php echo $set_id;?>&vendor_id=<?php echo $vendor_id;?>';</script>
    <?php
  }

?>
<script src="ckeditor.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
			//target:'#images_preview',
			beforeSubmit:function(e)
      {
				$('.uploading').show();
			},
			success:function(e){
				$('.uploading').hide();
        $('#images').val('');
        console.log(e);
			},
			error:function(e){
        console.log(e);
			},
			complete:function(e){
        console.log(e);
        console.log(e.responseText);
				if(e.responseText.indexOf("fail") == -1)
				{
          //console.log('here');
          window.location = 'vendor_new.php?set_id=<?php echo $set_id;?>&vendor_id=<?php echo $vendor_id;?>';
				}
				$('#images_preview').html('<?php echo $vendorClass->GetVendorImage($vendor_id, $set_id); ?>');
			}
		}).submit();
	});
});
</script>
<style>
ul, ol, li {
	margin: 0;
	padding: 0;
	list-style: none;
}
.vendor{ width:100%; float:left; margin-top:30px;}
.vendor ul{ margin:0; padding:0; list-style-type:none;}
.vendor ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
.vendor img{ width:250px;}
.none{ display:none;}
.upload_div{ margin-bottom:50px;}
.uploading{ margin-top:15px;}

</style>


<div class="panel panel-default">
  <div class="panel-heading">vendor Setting</div>
    <div class="panel-body">
      <a href = "http://www.oplusu.net/vendor_detail.php?vendor_id=<?php echo $vendor_id?>&allvendorson=1" target = "_blank">Preview Link</a>
      <form action = "vendor_publish.php" method = "post">
        <input type = "hidden" name = "vendor_id" value = "<?php echo $vendor_id?>"/>
        <input type = "hidden" name = "set_id" value = "<?php echo $set_id?>"/>


          <?php echo $vendorClass->GetVendorStatus($vendor_id); ?>


      </form>
<br/><br/>

      <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="vendor_upload.php">
        <input type="hidden" name="image_form_submit" value="1"/>
        <input type="hidden" name="upload_path" value="vendor_photo"/>
        <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>"/>
          <label>Choose Image</label>
          <input type="file" name="images[]" id="images" multiple >
          <div class="uploading none">
            <label>&nbsp;</label>
              Each File size < 5MB
              <img src="images/uploading.gif"/>
          </div>
          <br/>
      </form>

      <div class="vendor" id="images_preview">
          <?php echo $vendorClass->GetVendorImage($vendor_id, $set_id); ?>
      </div>
      <hr/>
      <div style = "padding-top:5px;">
        <form action = "vendor_new_save.php" method = "post">
          <input type = "hidden" name = "vendor_id" value = "<?php echo $vendor_id?>"/>
          <input type = "hidden" name = "set_id" value = "<?php echo $set_id?>"/>
          <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
            <thead>
              <tr><th colspan = "5">&nbsp;vendor Title</th></tr>
            </thead>
            <?php echo $vendorClass->GetVendorTitle($vendor_id); ?>
          </table>
          <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
            <thead>
              <tr><th colspan = "5">&nbsp;SEO Path</th></tr>
            </thead>
            <?php echo $vendorClass->GetVendorSEOPath($vendor_id); ?>
          </table>
          <hr/>
          <?php echo $vendorClass->GetVendorSection($set_id, $vendor_id); ?>
          <input type = "submit" value = "Save" class="btn btn-primary" />
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#photo_table tbody').sortable({
        update: function(event, ui) {

						$('#photo_table > tbody tr').each(function (i) {
								var newOrder = i +1;
								var vendor_photo_id = $(this).attr('id');
                var vendor_id = <?php echo $vendor_id;?>;
								$("#dorder" + vendor_photo_id).html(newOrder);
								SaveOrder(vendor_photo_id, vendor_id, newOrder);
								//console.log($(this).attr('id'));
						    //console.log($(this).attr('id')); // use $(this) as a reference to current tr object
						});
        },
        start: function(event, ui) {
            //console.log('start: ' + ui.item.index())
        }
    });
		function SaveOrder(vendor_photo_id, vendor_id, dorder)
		{
      console.log(vendor_photo_id, vendor_id, dorder);
			$.ajax({
			  url: "vendor_photo_order.php?vendor_photo_id=" + vendor_photo_id + "&vendor_id=" + vendor_id  + "&dorder=" + dorder
			})
			  .done(function( msg ) {
			    console.log(msg);
			  });
		}
</script>
<?php
}
include("interface2.php");
?>
