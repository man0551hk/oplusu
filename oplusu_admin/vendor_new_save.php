<?php
include("interface1.php");

if(isset($_POST["set_id"]) && isset($_POST["vendor_id"]))
{
  $set_id = $_POST["set_id"];
  $vendor_id = $_POST["vendor_id"];
  $seopath = $_POST["seopath"];

  $vendorSectionIDArray =  $vendorClass->GetVendorSectionIDArray($vendor_id);

  for($i = 0; $i < sizeof($vendorSectionIDArray); $i++)
  {
    $content = $_POST["section".$vendorSectionIDArray[$i]];
    $vendorClass->UpdateVendorSection($content, $vendorSectionIDArray[$i]);
  }

  $vendorTitleIDArray =  $vendorClass->GetVendorTitleIDArray($vendor_id);
  for($i = 0; $i < sizeof($vendorTitleIDArray); $i++)
  {
    $vendor_title = $_POST["vendor_title".$vendorTitleIDArray[$i]];
    if($_POST["seopath"] == "" && $i == 0)
    {
      if($vendor_title == "")
      {
        $seopath = $vendor_id;
      }
      else
      {
        $seopath = $vendor_title;
      }
    }
    $vendorClass->SaveVendorTitle($vendor_title, $vendor_id, $vendorTitleIDArray[$i]);
  }

  $langIDArray = $langClass->GetLangIDArray();


  $allowInsert = true;
  $emptyCheck = 0;
  for($i = 0; $i< sizeof($langIDArray); $i++)
  {

    if($_POST["newSection".$langIDArray[$i]] == '')
    {
      $emptyCheck += 1;
    }
  }
  if($emptyCheck == sizeof($langIDArray))
  {
    $allowInsert = false;
  }

  if($allowInsert == true)
  {
    $section_set_id = $vendorClass->InsertSection($vendor_id);
    for($i = 0; $i < sizeof($langIDArray); $i++)
    {
      $content = $_POST["newSection".$langIDArray[$i]];

      $vendorClass->InsertVendorSection($content, $vendor_id, $section_set_id, $langIDArray[$i]);
    }
  }

  $seopath = strtolower(str_replace(" " , "-", $seopath));
  $vendorClass->UpdateVendorSEOPath($vendor_id, $seopath);
?>
<script>
window.location = 'vendor_new.php?set_id=<?php echo $set_id;?>&vendor_id=<?php echo $vendor_id;?>';
</script>
<?php
}
include("interface2.php");
?>
