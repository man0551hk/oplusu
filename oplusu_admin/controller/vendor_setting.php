<?php
class VendorClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }

  function GetVendorList($set_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select t.vendor_title, p.set_id, p.vendor_id, p.status, p.dorder from vendor p, vendor_title t where set_id = '$set_id' and t.lang_id = 1 and p.vendor_id = t.vendor_id order by p.dorder") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $vendorName = $row["vendor_title"];
      if(empty($row["vendor_title"]) || $row["vendor_title"] == null)
      {
        $vendorName = '<No Name>';
      }

      $resultRow .= '<tr id = "'.$row["vendor_id"].'" setid = "'.$row["set_id"].'"><td >';
      $resultRow .= '<a href = "vendor_new.php?set_id='.$row["set_id"].'&vendor_id='.$row["vendor_id"].'">vendor# '.$row["vendor_id"] . ' : ' .$vendorName.'</a></td>';
      $resultRow .= '<td id = "dorder'.$row["vendor_id"].'">'.$row["dorder"].'</td>';
      $resultRow .= '<td>';
      if($row["status"] == 0)
      {
        $resultRow .= 'draft';
      }
      else {
        $resultRow .= 'published';
      }
      $resultRow .= '</td>';
      $resultRow .= '</tr>';
    }
    return $resultRow;
  }

  function Insertvendor($set_id)
  {
    $link = $this->Connection->ConnectDB();
    $result = mysqli_query($link, "select max(dorder) as newOrder from vendor where set_id = '$set_id'") or die (mysqli_error());
    $value = mysqli_fetch_object($result);
    $newOrder = $value->newOrder + 1;

    $result = mysqli_query($link, "insert into vendor (set_id, dorder, status) values ('$set_id', '$newOrder', 0)") or die (mysqli_error());
    echo "<script>console.log('aasa');</script>"; 
    $vendor_id = mysqli_insert_id($link);

    echo "<script>console.log('".$vendor_id."');</script>";
    $result = mysqli_query($link, "insert into vendor_title (vendor_title, vendor_id, lang_id) select '', '$vendor_id', lang_id from lang_setting") or die (mysqli_error());

    return $vendor_id;

  }

  function GetVendorPhotoID()
  {
    $link = $this->Connection->ConnectDB();
    $photo = 1;
    $result = mysqli_query($link, 'select max(vendor_photo_id) as photo_id from vendor_photo') or die (mysqli_error());
    $value = mysqli_fetch_object($result);
    $photo = $value->photo_id + 1;
    return $photo;
  }

  function SaveVendorPhoto($filePath, $vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $sql = "select max(dorder) as newOrder from vendor_photo where vendor_id = '$vendor_id'";
    $result = mysqli_query($link, $sql) or die (mysqli_error());
    $value = mysqli_fetch_object($result);
    $dorder = $value->newOrder + 1;

    $sql = "insert into vendor_photo (photo_path, vendor_id, dorder) values ('$filePath', '$vendor_id', '$dorder')";
    $result = mysqli_query($link, $sql) or die (mysqli_error());
    return mysqli_insert_id($link);
  }

  function GetVendorImage($vendor_id, $set_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow .= '';

    $resultRow .= '<table data-toggle="table" id="photo_table" data-row-style="rowStyle" class="table table-hover">';
      $resultRow .= '<thead>';
      $resultRow .= '<tr>';
          $resultRow .= '<th>Photo</th>';
          $resultRow .= '<th>Display Order</th>';
          $resultRow .= '<th></th>';
      $resultRow .= '</tr>';
      $resultRow .= '</thead>';

      $reultRow .= '<tbody>';
    $result = mysqli_query($link, "select * from vendor_photo where vendor_id = '$vendor_id' order by dorder") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<tr id = "'.$row["vendor_photo_id"].'">';
      $resultRow .= '<td><img src = "../'.$row["photo_path"].'" class = "img-responsive"/></td>';
      $resultRow .= '<td id = "dorder'.$row["vendor_photo_id"].'">'.$row["dorder"].'</td>';
      $resultRow .= '<td><a href = "vendor_photo_delete.php?vendor_photo_id='.$row["vendor_photo_id"].'&vendor_id='.$vendor_id.'&set_id='.$set_id.'">Delete</td></tr>';
    }
    $resultRow .= '</tbody>';
    $resultRow .= '</table>';
    return $resultRow;
  }

  function DeleteVendorPhoto($vendor_photo_id, $vendor_id, $set_id)
  {
    $link = $this->Connection->ConnectDB();
    $result = mysqli_query($link, "select photo_path from vendor_photo where vendor_photo_id = '$vendor_photo_id'") or die (mysqli_error());
    $photo_path = mysqli_fetch_object($result)->photo_path;
    unlink('../'.$photo_path);

    $result = mysqli_query($link, "delete from vendor_photo where vendor_photo_id = '$vendor_photo_id'") or die (mysqli_error());

    $result = mysqli_query($link, "select vendor_photo_id from vendor_photo where vendor_id = '$vendor_id' order by dorder") or die (mysqli_error());
    $num = 1;
    while($row = mysqli_fetch_array($result))
    {
      $photo_id = $row["vendor_photo_id"];
      mysqli_query($link, "update vendor_photo set dorder = '$num' where vendor_photo_id = '$photo_id'") or die (mysqli_error());
      $num += 1;
    }
  }

  function GetVendorTitle($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $resultRow .= '<tr>';
    $result = mysqli_query($link, "select * from vendor_title t, lang_setting l where t.lang_id = l.lang_id and t.vendor_id = '$vendor_id'") or die (mysqli_error());

    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<td>'.$row["display_name"].'<input type = "text" name = "vendor_title'.$row["vendor_title_id"].'" value = "'.$row["vendor_title"].'"/></td>';

    }
    $resultRow .= '</tr>';

    return $resultRow;
  }

  function GetVendorTitleIDArray($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $vendorTitleIDArray = Array();
    $result = mysqli_query($link, "select * from vendor_title t, lang_setting l where t.lang_id = l.lang_id and t.vendor_id = '$vendor_id'") or die (mysqli_error());

    while($row = mysqli_fetch_array($result))
    {
      $vendorTitleIDArray[] = $row["vendor_title_id"];

    }
    return $vendorTitleIDArray;
  }

  function SaveVendorTitle($vendor_title, $vendor_id, $vendor_title_id)
  {
    $link = $this->Connection->ConnectDB();
    $vendor_title = str_replace("'","\'", $vendor_title);
    mysqli_query($link, "update vendor_title set vendor_title = '$vendor_title' where vendor_id = '$vendor_id' and vendor_title_id = '$vendor_title_id'") or die (mysqli_error());
  }

  function GetVendorSection($set_id, $vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';

    $result2 = mysqli_query($link, "select * from vendor_section_set where vendor_id ='$vendor_id'") or die (mysqli_error());
    while($row2 = mysqli_fetch_array($result2))
    {
      $section_set_id = $row2["section_set_id"];
      $resultRow .= '<div class = "row">';
      $resultRow .= '<div class = "col-md-12">';
      $resultRow .= '<h3>Section_ID: '.$section_set_id.'</h3>';
      $resultRow .= '<a href = "delete_vendor_set.php?section_set_id='.$section_set_id.'&set_id='.$set_id.'&vendor_id='.$vendor_id.'" class="btn btn-danger">Delete</a>';
      $resultRow .= '</div>';
      $resultRow .= '</div>';

      $sql = "select * from vendor_section s, lang_setting l where s.lang_id = l.lang_id and s.vendor_id = '$vendor_id' and s.section_set_id = '$section_set_id'";

      $result = mysqli_query($link, $sql) or die (mysqli_error());

      while($row = mysqli_fetch_array($result))
      {
        $resultRow .= '<div class = "row">';
        $resultRow .= '<div class = "col-md-12">';
        $resultRow .= '<h4>'.$row["display_name"].' - Section</h4>';
        $resultRow .= '<b>Content</b>';
        $resultRow .= '<textarea name="section'.$row["vendor_section_id"].'" id="section'.$row["vendor_section_id"].'" rows="10" cols="80">';
        $resultRow .= $row["content"];
        $resultRow .= '</textarea>';
        $resultRow .= '<script>';
        $resultRow .= 'CKEDITOR.replace( "section'.$row["vendor_section_id"].'" );';
        $resultRow .= '</script>';
        $resultRow .= '</div>';
        $resultRow .= '</div>';
        $resultRow .= "<hr/>";
      }
    }

    $resultRow .= "<h3>New Section</h3>";

    $result = mysqli_query($link, "select * from lang_setting") or die(mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<div class = "row">';
      $resultRow .= '<div class = "col-md-12">';
      $resultRow .= '<h4>'.$row["display_name"].' - New Section</h4>';
      $resultRow .= '<b>Content</b>';
      $resultRow .= '<textarea name="newSection'.$row["lang_id"].'" id="newSection'.$row["lang_id"].'" rows="10" cols="80">';
      $resultRow .= '</textarea>';
      $resultRow .= '<script>';
      $resultRow .= 'CKEDITOR.replace( "newSection'.$row["lang_id"].'" );';
      $resultRow .= '</script>';
      $resultRow .= '</div>';
      $resultRow .= '</div>';
      $resultRow .= "<hr/>";
    }
    return $resultRow;
  }

  function GetVendorSectionIDArray($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $vendorSectionIDArray = Array();
    $result = mysqli_query($link, "select vendor_section_id from vendor_section where vendor_id = '$vendor_id'") or die (mysqli_error());

    while($row = mysqli_fetch_array($result))
    {
      $vendorSectionIDArray[] = $row["vendor_section_id"];
    }
    return $vendorSectionIDArray;
  }

  function InsertSection($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into vendor_section_set (vendor_id, create_date) values ('$vendor_id', NOW())") or die (mysqli_error());
    return mysqli_insert_id($link);
  }

  function DeleteVendorSection($section_set_id)
  {
    echo "<script>console.log('".$section_set_id."');</script>";
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "delete from vendor_section_set where section_set_id = '$section_set_id'") or die (mysqli_error());
    mysqli_query($link, "delete from vendor_section where section_set_id = '$section_set_id'") or die (mysqli_error());

  }

  function InsertVendorSection($content, $vendor_id, $section_set_id, $lang_id)
  {
    $link = $this->Connection->ConnectDB();
    $content = str_replace("'","\'", $content);
    mysqli_query($link, "insert into vendor_section (content, vendor_id, section_set_id, lang_id) values ('$content', '$vendor_id', '$section_set_id', '$lang_id')") or die (mysqli_error());
  }

  function UpdateVendorSection($content, $vendor_section_id)
  {
    $link = $this->Connection->ConnectDB();
    $content = str_replace("'","\'", $content);
    mysqli_query($link, "update vendor_section set content = '$content' where vendor_section_id = '$vendor_section_id'") or die (mysqli_error());
  }

  function GetVendor($currLang_ID, $langClass)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select set_id from vendor_category_setting where lang_id = '$currLang_ID' order by category_id") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $set_id = $row["set_id"];

      if($_GET["allVendorson"] == 1)
      {
        $result2 = mysqli_query($link, "select vendor_id, seopath from vendor where set_id = '$set_id' order by dorder")  or die (mysqli_error());
      }
      else {
        $result2 = mysqli_query($link, "select vendor_id, seopath from vendor where status = 1 and set_id = '$set_id' order by dorder")  or die (mysqli_error());
      }

      while($row2 = mysqli_fetch_array($result2))
      {
        $vendor_id = $row2["vendor_id"];
        $seopath = $row2["seopath"];
        $resultRow .= '<div class="col-sm-3 col-xs-12 isotopeSelector '.$set_id.'">';
            $resultRow .= '<article class="">';
                $resultRow .= '<figure>';



                    $resultFirstPhoto = mysqli_query($link, "select photo_path from vendor_photo where vendor_id = '$vendor_id' order by dorder limit 1")  or die (mysqli_error());
                    $firstPhoto = mysqli_fetch_object($resultFirstPhoto)->photo_path;
                    //$resultRow .= '<a href = "vendor_detail.php?vendor_id='.$vendor_id.'"><img src="/'.$firstPhoto.'"  style="height:240px;" /></a>';

                    if($currLang_ID != 2)
                    {
                      $lang_code = strtolower($langClass->GetLangCode($currLang_ID));
                      if($_GET["allVendorson"] == 1)
                      {
                        $resultRow .= '<a href = "/vendor_detail.php?vendor_id='.$vendor_id.'&lang='.$lang_code.'&allVendorson=1"><img src="/'.$firstPhoto.'"  style="height:240px;" /></a>';
                      }
                      else {
                        $resultRow .= '<a href = "/vendor/'.$seopath.'/'.$lang_code.'/"><img src="/'.$firstPhoto.'"  style="height:240px;" /></a>';
                      }

                    }
                    else {
                      if($_GET["allVendorson"] == 1)
                      {
                        $resultRow .= '<a href = "/vendor_detail.php?vendor_id='.$vendor_id.'&allVendorson=1"><img src="/'.$firstPhoto.'"  style="height:240px;" /></a>';
                      }
                      else {
                        $resultRow .= '<a href = "/vendor/'.$seopath.'/"><img src="/'.$firstPhoto.'"  style="height:240px;" /></a>';
                      }
                    }
                $resultRow .= '</figure>';

                $resultTitle = mysqli_query($link, "select vendor_title from vendor_title where vendor_id = '$vendor_id' and lang_id = '$currLang_ID'") or die (mysqli_error());
                $resultRow .= '<div class="article-title">';

                if($currLang_ID != 2)
                {
                  $lang_code = strtolower($langClass->GetLangCode($currLang_ID));
                  if($_GET["allVendorson"] == 1)
                  {
                    $resultRow .= '<a href = "/vendor_detail.php?vendor_id='.$vendor_id.'&lang='.$lang_code.'&allVendorson=1">';
                  }
                  else {
                    $resultRow .= '<a href = "/vendor/'.$seopath.'/'.$lang_code.'/">';
                  }

                }
                else {
                  if($_GET["allVendorson"] == 1)
                  {
                    $resultRow .= '<a href = "/vendor_detail.php?vendor_id='.$vendor_id.'&allVendorson=1">';
                  }
                  else {
                    $resultRow .= '<a href = "/vendor/'.$seopath.'/">';
                  }
                }

                //'<a href="vendor_detail.php?vendor_id='.$vendor_id.'">';
                  $thisTitle = mysqli_fetch_object($resultTitle)->vendor_title;
                  if(strripos($thisTitle, ",") > 0)
                  {
                    $subject = $thisTitle;
                    $search = ',';
                    $replace = ', <br/>';

                    $thisTitle = strrev(implode(strrev($replace), explode(strrev($search), strrev($subject), 2)));

                  }
                  else
                  {
                    $thisTitle = $thisTitle.'<br/>　';
                  }
                  $resultRow .= $thisTitle;
                $resultRow .= '</a></div>';

            $resultRow .= '</article>';
        $resultRow .= '</div>';

      }
    }
    return $resultRow;
  }

  function VendorDetail($currLang_id, $vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultSet = Array();
    $firstImageResult = '';
    $secondImageResult = '';

    $statusRs = mysqli_query($link, "select vendor_id from vendor where vendor_id = '$vendor_id' and status = 1") or die(mysqli_error());
    $status = mysqli_fetch_object($statusRs)->vendor_id;

    $allow = false;
    if($status > 0)
    {
      $allow = true;
    }

    if($_GET["allVendorson"] == "1")
    {
      $allow = true;
    }



    if($allow)
    {
      $result = mysqli_query($link, "select photo_path from vendor_photo where vendor_id = '$vendor_id' order by dorder") or die (mysqli_error());
      $count = 0;
      while($row = mysqli_fetch_array($result))
      {
        if($count == 0)
        {
          $firstImageResult .= '<li data-target="#myCarousel" data-slide-to="'.$count.'" class="active"></li>';
          $secondImageResult .= '<div class="item active"><img src="/'.$row["photo_path"].'"></div>';
        }
        else
        {
          $firstImageResult .= '<li data-target="#myCarousel" data-slide-to="'.$count.'"></li>';
          $secondImageResult .= '<div class="item"><img src="/'.$row["photo_path"].'"></div>';
        }
        $count++;
      }

      $resultRow = '';
      $resultTitle = mysqli_query($link, "select vendor_title from vendor_title where vendor_id = '$vendor_id' and lang_id = '$currLang_id'") or die (mysqli_error());
      $resultRow .= '<h2>'.mysqli_fetch_object($resultTitle)->vendor_title.'</h2>';

      $result = mysqli_query($link, "select content from vendor_section where vendor_id = '$vendor_id' and lang_id = '$currLang_id' order by vendor_section_id") or die (mysqli_error());
      while($row = mysqli_fetch_array($result))
      {
        $resultRow .= $row["content"];
      }

      $resultSet[] = $firstImageResult;
      $resultSet[] = $secondImageResult;
      $resultSet[] = $resultRow;
    }
    return $resultSet;
  }

  function GetVendorStatus($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select status from vendor where vendor_id = '$vendor_id'") or die (mysqli_error());
    $status = mysqli_fetch_object($result)->status;
    if($status == 1)
    {
        $resultRow .= '<input type = "hidden" name = "action" value = "0" />';
        $resultRow .= '<input type = "submit" value = "Set to Draft" class="btn btn-danger"/>';
    }
    else
    {
      $resultRow .= '<input type = "hidden" name = "action" value = "1" />';
      $resultRow .= '<input type = "submit" value = "Set to Publish" class="btn btn-primary"/>';
    }
    return $resultRow;
  }

  function SaveVendorStatus($vendor_id, $action)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update vendor set status = '$action' where vendor_id = '$vendor_id'") or die (mysqli_error());
  }

  function GetVendorSEOPath($vendor_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select seopath from vendor where vendor_id = '$vendor_id'") or die (mysqli_error());
    if($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<tr><td><input type = "text" name ="seopath" id ="seopath" value = "'.$row["seopath"].'" class="form-control"/></td></tr>';
    }
    return $resultRow;
  }

  function UpdateVendorSEOPath($vendor_id, $seopath)
  {
    $link = $this->Connection->ConnectDB();
    $seopath = str_replace(",", "", $seopath);
    mysqli_query($link, "update vendor set seopath = '$seopath' where vendor_id = '$vendor_id'") or die (mysqli_error());
  }

  function VendorSEOPath($seopath)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select vendor_id from vendor where seopath = '$seopath'") or die (mysqli_error());
    if($row = mysqli_fetch_array($result))
    {
      $resultRow .= $row["vendor_id"];
    }
    return $resultRow;
  }

  function UpdateDorder($vendor_id, $set_id, $dorder)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update vendor set dorder = '$dorder' where vendor_id = $vendor_id and set_id = '$set_id'") or die (mysqli_error());
  }

  function UpdatePhotoDorder($vendor_photo_id, $vendor_id, $dorder)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update vendor_photo set dorder = '$dorder' where $vendor_photo_id = '$vendor_photo_id' and vendor_id = $vendor_id") or die (mysqli_error());

  }
}

$vendorClass = new VendorClass($connectionClass);

?>
