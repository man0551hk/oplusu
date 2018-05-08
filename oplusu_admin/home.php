<?php
include 'interface1.php';
?>
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
			},
			error:function(e){
        console.log(e);
			},
			complete:function(e){
				if(e.responseText == '')
				{
					window.location = 'home.php';
				}
				$('#images_preview').html('<?php echo $homeClass->GetSliderImage();?>');
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
  <div class="panel-heading">Home Page Setting</div>
    <div class="panel-body">

      <div class="panel panel-default">
        <div class="panel-heading">Slider Photos</div>
          <div class="panel-body">

            <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
              <input type="hidden" name="image_form_submit" value="1"/>
              <input type="hidden" name="upload_path" value="photo_slider"/>
                <label>Choose Image</label>
                <input type="file" name="images[]" id="images" multiple >
                <div class="uploading none">
                  <label>&nbsp;</label>
                    <img src="images/uploading.gif"/>
                </div>

            </form>

            <div class="gallery" id="images_preview">
							<?php echo $homeClass->GetSliderImage();?>
						</div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $('table tbody').sortable({
        update: function(event, ui) {

						$('table > tbody tr').each(function (i) {
								var newOrder = i +1;
								var photo_id = $(this).attr('id');
								$("#dorder" + photo_id).html(newOrder);
								SaveOrder(photo_id, newOrder);
								//console.log($(this).attr('id'));
						    //console.log($(this).attr('id')); // use $(this) as a reference to current tr object
						});
        },
        start: function(event, ui) {
            //console.log('start: ' + ui.item.index())
        }
    });
		function SaveOrder(photoid, dorder)
		{
			$.ajax({
			  url: "home_slider_order.php?photo_id=" + photoid + "&dorder=" + dorder
			})
			  .done(function( msg ) {
			    console.log( "Data Saved");
			  });
		}
</script>
<?php
include 'interface2.php';
?>
