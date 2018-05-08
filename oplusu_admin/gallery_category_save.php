<?php
include("interface1.php");
?>
<?php

  $categoryIDArray = $galleryCategoryClass->ReturnCategroyID();
  for($i= 0; $i < sizeof($categoryIDArray); $i++)
  {
    $editcategory = $_POST["editcategory".$categoryIDArray[$i]];
    //echo $editcategory .'<br/>';
    $galleryCategoryClass->UpdateGalleryCategory($editcategory,  $categoryIDArray[$i]);
  }

  $langIDArray = $langClass->GetLangIDArray();
  $allowInsert = true;
  $emptyCheck = 0;
  for($i = 0; $i< sizeof($langIDArray); $i++)
  {
    if($_POST["newCategory".$langIDArray[$i]] == '')
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
    $set_id = $galleryCategoryClass->InsertCategory();

    for($i =  0; $i< sizeof($langIDArray); $i++)
    {
      if(isset($_POST["newCategory".$langIDArray[$i]]) )
      {
        $category = $_POST["newCategory".$langIDArray[$i]];
        //echo 'cat '. $category . '<br/>';
        $lang_id = $langIDArray[$i];
        $galleryCategoryClass->InsertGalleryCategory($category, $set_id, $lang_id);
      }
    }
  }



?>

<script>
window.location = "gallery_category.php";
</script>

<?php
include("interface2.php");
?>
