<?php
class VendorCategoryClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }

  function GetVendorCategorySetting()
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';

    $result = mysqli_query($link, "select * from vendor_category") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $set_id = $row["set_id"];
      $resultRow .= '<tr>';
      $result2 = mysqli_query($link, "select * from lang_setting") or die (mysqli_error());
      while($row2 = mysqli_fetch_array($result2))
      {
        $lang_id = $row2["lang_id"];

        $resultRow .= '<td>';
        $result3 = mysqli_query($link, "select * from vendor_category_setting where lang_id = '$lang_id' and set_id = '$set_id'") or  (mysqli_error());
        if($row3 = mysqli_fetch_array($result3))
        {
            $resultRow .= $row2["display_name"] . '<input type = "text" name = "editcategory'.$row3["category_id"].'" value = "'.$row3["category"].'" />';
        }

        $resultRow .= '</td>';
      }
      $resultRow .= '<td>';
      $resultRow .= '<a href = "vendor_category_delete.php?set_id='.$set_id.'" class="btn btn-danger">Delete Category</a>';
      $resultRow .= '</td>';
      $resultRow .= '</tr>';
    }


    $resultRow .= '<tr>';
    $resultRow .= '<td colspan = "5">New Category</td>';
    $resutRow .= '</tr>';
    $resultRow .= '<tr>';
    $result = mysqli_query($link, "select * from lang_setting") or die (mysqli_error());
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

  function InsertVendorCategory()
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into vendor_category (create_date) values (NOW())") or die (mysqli_error());
    $set_id = mysqli_insert_id($link);
    return $set_id;
  }

  function InsertVendorCategorySetting($category, $set_id, $lang_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into vendor_category_setting (category, set_id, lang_id) values ('$category', '$set_id', '$lang_id')") or (mysqli_error());
    $category_id = mysqli_insert_id($link);
    return $category_id;
  }

  function UpdateVendorCategory($category, $category_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update vendor_category_setting set category = '$category' where category_id = '$category_id'") or (mysqli_error());
  }

  function DeleteVendorCategory($set_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "delete from vendor_category where set_id = '$set_id'") or (mysqli_error());
    mysqli_query($link, "delete from vendor_category_setting where set_id = '$set_id'") or (mysqli_error());
  }

  function ReturnVendorCategroyID()
  {
    $link = $this->Connection->ConnectDB();
    $categoryIDArray = Array();
    $result = mysqli_query($link, "select category_id from vendor_category_setting") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $categoryIDArray[] = $row["category_id"];
    }
    return $categoryIDArray;
  }

  function vendorCategory($currLang_ID)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select * from vendor_category_setting where lang_id = '$currLang_ID' order by category_id") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<li><a href="#" data-filter=".' . $row["set_id"] . '">' . $row["category"] . '</a><span>|</span></li>';
    }
    return $resultRow;
  }

  function ReturnVendorCategroyDropDown($set_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select category_id, category, set_id from vendor_category_setting where lang_id = 1") or die (mysqli_error());
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

$vendorCategoryClass = new VendorCategoryClass($connectionClass);
?>
