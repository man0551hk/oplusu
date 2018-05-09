<?php
include 'interface1.php';
include '../oplusu_admin/controller/contactInfo_setting.php';
$contact = $ContactInfoClass->GetContact($currLang_id);
$thislang = 'EN';
if($currLang_id == 1)
{
  $thislang = 'EN';
}
else if($currLang_id == 2)
{
  $thislang = 'zh-TW';
}
else if($currLang_id == 3)
{
  $thislang = 'zh-CN';
}
else if($currLang_id == 4)
{}
else if($currLang_id == 5)
{}
?>
<script>
  function initMap() {
    var myLatLng = {lat: <?php echo $contact[4];?>, lng: <?php echo $contact[5];?>};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: myLatLng
    });
    var contentString = '<b>BC & D Internation Limited</b><br/><?php echo $contact[0];?>';

    var infowindow = new google.maps.InfoWindow({
       content: contentString
     });
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map

    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
  }

</script>



<section id="contact-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
               <div class="map-area">
                  <div class="map wow fadeInUp" data-wow-duration="500ms" data-wow-delay=".1s">
                      <div id = "map" width="100%" height="400" style="width:100%;height:400px;"></div>

                      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuXRgE86melyFGPQZ_OGoIf9javhhQMg4&callback=initMap&language=<?php echo $thislang;?>" async defer></script>

                  </div>
              </div>
          </div>
      </div>
      <div class="row address-details">
          <div class="col-md-3">
              <div class="address wow fadeInUp" data-wow-duration="500ms" data-wow-delay=".5s">
                  <i class="ion-ios-location-outline"></i>
                  <p><?php echo $contact[0];?></p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="email wow fadeInUp" data-wow-duration="500ms" data-wow-delay=".7s">
                  <i class="ion-ios-email-outline"></i>
                  <p><?php echo $contact[1];?><br>&nbsp;<br>&nbsp;</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="phone wow fadeInUp" data-wow-duration="500ms" data-wow-delay=".9s">
                  <i class="ion-ios-telephone-outline"></i>
                  <p><?php echo $contact[2];?><br>&nbsp;<br>&nbsp;</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="phone wow fadeInUp" data-wow-duration="500ms" data-wow-delay=".9s">
                  <i class="ion-ios-people-outline"></i>
                  <p><?php echo $contact[3];?><br>&nbsp;<br>&nbsp;</p>
              </div>
          </div>
      </div>
  </div>
</section>

<?php
include("interface2.php");
?>
