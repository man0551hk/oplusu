<?php
include("interface1.php");

if(isset($_GET["set_id"]))
{
  $set_id = $_GET["set_id"];
  $project_id = 0;
  if(isset($_GET["project_id"]))
  {
    $project_id = $_GET["project_id"];
  }

  if($project_id == 0)
  {
    $project_id = $galleryClass->InsertProject($set_id);
    ?>
    <script>window.location='gallery_new.php?set_id=<?php echo $set_id;?>&project_id=<?php echo $project_id;?>';</script>
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
          window.location = 'gallery_new.php?set_id=<?php echo $set_id;?>&project_id=<?php echo $project_id;?>';
				}
				$('#images_preview').html('<?php echo $galleryClass->GetProjectImage($project_id, $set_id); ?>');
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
.gallery{ width:100%; float:left; margin-top:30px;}
.gallery ul{ margin:0; padding:0; list-style-type:none;}
.gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
.gallery img{ width:250px;}
.none{ display:none;}
.upload_div{ margin-bottom:50px;}
.uploading{ margin-top:15px;}

</style>


<div class="panel panel-default">
  <div class="panel-heading">Gallery Setting</div>
    <div class="panel-body">
      <a href = "http://www.oplusu.net/project_detail.php?project_id=<?php echo $project_id?>&allprojectson=1" target = "_blank">Preview Link</a>
      <form action = "gallery_publish.php" method = "post">
        <input type = "hidden" name = "project_id" value = "<?php echo $project_id?>"/>
        <input type = "hidden" name = "set_id" value = "<?php echo $set_id?>"/>


          <?php echo $galleryClass->GetGalleryStatus($project_id); ?>


      </form>
<br/><br/>

      <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="project_upload.php">
        <input type="hidden" name="image_form_submit" value="1"/>
        <input type="hidden" name="upload_path" value="project_photo"/>
        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"/>
          <label>Choose Image</label>
          <input type="file" name="images[]" id="images" multiple >
          <div class="uploading none">
            <label>&nbsp;</label>
              Each File size < 10MB
              <img src="images/uploading.gif"/>
          </div>
          <br/>
      </form>

      <div class="gallery" id="images_preview">
          <?php echo $galleryClass->GetProjectImage($project_id, $set_id); ?>
      </div>
      <hr/>
      <div style = "padding-top:5px;">
        <form action = "gallery_new_save.php" method = "post">
          <input type = "hidden" name = "project_id" value = "<?php echo $project_id?>"/>
          <input type = "hidden" name = "set_id" value = "<?php echo $set_id?>"/>
          <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
            <thead>
              <tr><th colspan = "5">&nbsp;Project Title</th></tr>
            </thead>
            <?php echo $galleryClass->GetProjectTitle($project_id); ?>
          </table>
          <table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">
            <thead>
              <tr><th colspan = "5">&nbsp;SEO Path</th></tr>
            </thead>
            <?php echo $galleryClass->GetProjectSEOPath($project_id); ?>
          </table>
          <hr/>
          <?php echo $galleryClass->GetProjectSection($set_id, $project_id); ?>
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
								var project_photo_id = $(this).attr('id');
                var project_id = <?php echo $project_id;?>;
								$("#dorder" + project_photo_id).html(newOrder);
								SaveOrder(project_photo_id, project_id, newOrder);
								//console.log($(this).attr('id'));
						    //console.log($(this).attr('id')); // use $(this) as a reference to current tr object
						});
        },
        start: function(event, ui) {
            //console.log('start: ' + ui.item.index())
        }
    });
		function SaveOrder(project_photo_id, project_id, dorder)
		{
      //console.log(project_photo_id, project_id, dorder);
			$.ajax({
			  url: "gallery_photo_order.php?project_photo_id=" + project_photo_id + "&project_id=" + project_id  + "&dorder=" + dorder
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
