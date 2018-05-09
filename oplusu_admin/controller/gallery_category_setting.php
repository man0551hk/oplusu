<?php
class GalleryCategoryClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }

  function GetGalleryCategorySetting()
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';

    $result = mysqli_query($link, "select * from gallery_category") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $set_id = $row["set_id"];
      $resultRow .= '<tr>';
      $result2 = mysqli_query($link, "select * from lang_setting") or die (mysql_error());
      while($row2 = mysqli_fetch_array($result2))
      {
        $lang_id = $row2["lang_id"];

        $resultRow .= '<td>';
        $result3 = mysqli_query($link, "select * from gallery_category_setting where lang_id = '$lang_id' and set_id = '$set_id'") or  (mysql_error());
        if($row3 = mysqli_fetch_array($result3))
        {
            $resultRow .= $row2["display_name"] . '<input type = "text" name = "editcategory'.$row3["category_id"].'" value = "'.$row3["category"].'" />';
        }

        $resultRow .= '</td>';
      }
      $resultRow .= '<td>';
      $resultRow .= '<a href = "gallery_category_delete.php?set_id='.$set_id.'" class="btn btn-danger">Delete Category</a>';
      $resultRow .= '</td>';
      $resultRow .= '</tr>';
    }


    $resultRow .= '<tr>';
    $resultRow .= '<td colspan = "5">New Category</td>';
    $resutRow .= '</tr>';
    $resultRow .= '<tr>';
    $result = mysqli_query($link, "select * from lang_setting") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<td>';
      $resultRow .= '<div class ="form-inline">';
      $resultRow .= $row["display_name"];
      $resultRow .= '<input type = "text" name = "newCategory'.$row["lang_id"].'" />';
      $resultRow .= '</div>';
      $resultRow .= '</td>';
    }
    $resutRow .= '</tr>';

    return $resultRow;
  }

  function InsertCategory()
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into gallery_category (create_date) values (NOW())") or die (mysql_error());
    $set_id = mysql_insert_id();
    return $set_id;
  }

  function InsertGalleryCategory($category, $set_id, $lang_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into gallery_category_setting (category, set_id, lang_id) values ('$category', '$set_id', '$lang_id')") or (mysql_error());
    $category_id = mysql_insert_id();
    return $category_id;
  }

  function UpdateGalleryCategory($category, $category_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update gallery_category_setting set category = '$category' where category_id = '$category_id'") or (mysql_error());
  }

  function DeleteGalleryCategory($set_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "delete from gallery_category where set_id = '$set_id'") or (mysql_error());
    mysqli_query($link, "delete from gallery_category_setting where set_id = '$set_id'") or (mysql_error());
  }

  function ReturnCategroyID()
  {
    $link = $this->Connection->ConnectDB();
    $categoryIDArray = Array();
    $result = mysqli_query($link, "select category_id from gallery_category_setting") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $categoryIDArray[] = $row["category_id"];
    }
    return $categoryIDArray;
  }

  function GalleryCategory($currLang_ID)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select * from gallery_category_setting where lang_id = '$currLang_ID' order by category_id") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<li><a href="#" data-filter=".' . $row["set_id"] . '">' . $row["category"] . '</a><span>|</span></li>';
    }
    return $resultRow;
  }

  function ReturnCategroyDropDown($set_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select category_id, category, set_id from gallery_category_setting where lang_id = 1") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      if($row["set_id"] == $set_id)
      {
        $resultRow .= '<option value = "' .$row["set_id"]. '" selected>'.$row["category"].'</option>';
      }
      else {
        $resultRow .= '<option value = "' .$row["set_id"]. '">'.$row["category"].'</option>';
      }

    }
    return $resultRow;
  }

}

$galleryCategoryClass = new GalleryCategoryClass($connectionClass);
?>
