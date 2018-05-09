<?php
class HomeClass
{
    private $Connection;
    public function __construct($connectionClass)
    {
      $this->Connection = $connectionClass;
    }

    function GetSliderImage()
    {
      $link = $this->Connection->ConnectDB();
      $resultRow .= '<table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover" id = "home_slider">';
        $resultRow .= '<thead>';
        $resultRow .= '<tr>';
            $resultRow .= '<th>Photo</th>';
            $resultRow .= '<th>Display Order</th>';
            $resultRow .= '<th></th>';
        $resultRow .= '</tr>';
        $resultRow .= '</thead>';

      $resultRow .= '<tbody>';
      $result = mysqli_query($link, 'select * from photo_slider order by dorder');
      $num_rows = mysqli_num_rows ($result);
      while($row = mysqli_fetch_array($result))
      {
        $resultRow .= '<tr id ="'.$row["photo_id"].'"><td><img src = "../'.$row["photo_path"].'" class = "img-responsive" alt = ""/></td>';
        $resultRow .= '<td id = "dorder'.$row["photo_id"].'">'.$row["dorder"].'</td>';
        $resultRow .= '<td><a href = "home_delete.php?photo_id='.$row["photo_id"].'">Delete</td></tr>';
      }
      $resultRow .= '</tbody>';
      $resultRow .= '</table>';
      return $resultRow;
    }

    function GetSliderPhotoID()
    {
      $link = $this->Connection->ConnectDB();
      $photo = 1;
      $result = mysqli_query($link, 'select max(photo_id) as photo_id from photo_slider') or die (mysql_error());
      $value = mysqli_fetch_object($result);
      $photo = $value->photo_id + 1;
      return $photo;
    }

    function SaveSliderPhoto($filePath)
    {
      $link = $this->Connection->ConnectDB();
      $sql = "select max(dorder) as newOrder from photo_slider";
      $result = mysqli_query($link, $sql);
      $value = mysqli_fetch_object($result);
      $newOrder = $value->newOrder + 1;

      $sql = "insert into photo_slider (photo_path, dorder) values ('$filePath', '$newOrder')";
      $result = mysqli_query($link, $sql) or die (mysql_error());
    }

    function DeleteSliderPhoto($photo_id)
    {
      $link = $this->Connection->ConnectDB();
      $sql = "select photo_path from photo_slider where photo_id = '$photo_id'";
      $result = mysqli_query($link, $sql) or die (mysql_error());
      $photo_path = mysqli_fetch_object($result)->photo_path;

      unlink("../" . $photo_path);

      $sql = "delete from photo_slider where photo_id = '$photo_id'";
      mysqli_query($link, $sql) or die (mysql_error());

      $sql = "select photo_id from photo_slider order by dorder";
      $result = mysqli_query($link, $sql);
      $i = 1;
      while($row = mysqli_fetch_array($result))
      {
        $photo_id = $row["photo_id"];
        mysqli_query($link, "update photo_slider set dorder = '$i' where photo_id = '$photo_id'");
        $i+=1;
      }
    }

    function HomeGetSliderImage()
    {
      $link = $this->Connection->ConnectDB();
      $indicators = '';
      $photos = '';
      $count = 0;
      $result = mysqli_query($link, 'select * from photo_slider order by dorder');
      while($row = mysqli_fetch_array($result))
      {
        if($count == 0)
        {
          $indicators .= '<li data-target="#myCarousel" data-slide-to="' . $count . '" class="active"></li>';
          $photos .= '<div class="item active"><img src="imageHandler.php?imagePath='.$row["photo_path"].'&new_width=1140&new_height=641" alt = "'.$row["photo_path"].'"></div>';
        }
        else
        {
          $indicators .= '<li data-target="#myCarousel" data-slide-to="' . $count . '"></li>';
          $photos .= '<div class="item"><img src="imageHandler.php?imagePath='.$row["photo_path"].'&new_width=1140&new_height=641" alt = "'.$row["photo_path"].'"></div>';
        }
        $count++;
      }
      $sliderArray = array($indicators, $photos);
      return $sliderArray;
    }

    function createThumbnail($imageName,$newWidth,$newHeight,$uploadDir,$moveToDir)
    {
        $path = $uploadDir . '/' . $imageName;

        $mime = getimagesize($path);

        if($mime['mime']=='image/png'){ $src_img = imagecreatefrompng($path); }
        if($mime['mime']=='image/jpg'){ $src_img = imagecreatefromjpeg($path); }
        if($mime['mime']=='image/jpeg'){ $src_img = imagecreatefromjpeg($path); }
        if($mime['mime']=='image/pjpeg'){ $src_img = imagecreatefromjpeg($path); }

        $old_x = imageSX($src_img);
        $old_y = imageSY($src_img);

        if($old_x > $old_y)
        {
            $thumb_w    =   $newWidth;
            $thumb_h    =   $old_y/$old_x*$newWidth;
        }

        if($old_x < $old_y)
        {
            $thumb_w    =   $old_x/$old_y*$newHeight;
            $thumb_h    =   $newHeight;
        }

        if($old_x == $old_y)
        {
            $thumb_w    =   $newWidth;
            $thumb_h    =   $newHeight;
        }

        $dst_img        =   ImageCreateTrueColor($thumb_w,$thumb_h);

        imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);


        // New save location
        $new_thumb_loc = $moveToDir . '/' . $imageName;

        if($mime['mime']=='image/png'){ $result = imagepng($dst_img,$new_thumb_loc,8); }
        if($mime['mime']=='image/jpg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
        if($mime['mime']=='image/jpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
        if($mime['mime']=='image/pjpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }

        imagedestroy($dst_img);
        imagedestroy($src_img);
        return $result;
    }

    function SavePhotoOrder($photo_id, $dorder)
    {
      $link = $this->Connection->ConnectDB();
      mysqli_query($link, "update photo_slider set dorder = '$dorder' where photo_id = '$photo_id'") or die (mysql_error());
    }
}

$homeClass = new HomeClass($connectionClass);
?>
