<?php
class AboutClass
{
  function GetAboutSetting($lang_id)
  {
    $resultRow = '';
    $resultRow .= '<input type = "hidden" name = "lang_id" value = "'.$lang_id.'"/>';
    $result = mysqli_query($link, "select about_id, title, content from about_setting where lang_id = '$lang_id' order by about_id") or die(mysql_error());
    $count = 1;
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<div class = "row">';
        $resultRow .= '<div class = "col-md-3">';
        $resultRow .= '<h4>Section '.$count.'</h4>';
        $resultRow .= '</div>';
        $resultRow .= '<div class = "col-md-4">';
        $resultRow .= '<a href = "about_delete.php?about_id='.$row["about_id"].'&lang_id='.$lang_id.'" class="btn btn-danger">Delete</a><br/>';
        $resultRow .= '</div>';
      $resultRow .= '</div>';

        $resultRow .= '<div class = "row">';
          $resultRow .= '<div class = "col-md-12">';
          $resultRow .= '<b>Title</b> <input type = "text" name = "title'.$row["about_id"].'" class = "form-control" value = "'.$row["title"].'">';
          $resultRow .= '<b>Content</b>';
          $resultRow .= '<textarea name="content'.$row["about_id"].'" id="content'.$row["about_id"].'" rows="10" cols="80">';
          $resultRow .= $row["content"];
          $resultRow .= '</textarea>';
          $resultRow .= '<script>';
          $resultRow .= 'CKEDITOR.replace( "content'.$row["about_id"].'" );';
          $resultRow .= '</script>';
          $resultRow .= '</div>';
        $resultRow .= '</div>';
        $resultRow .= '<hr/>';
        $count+=1;
    }
      $resultRow .= '<div class = "row">';
      $resultRow .= '<div class = "col-md-12">';
      $resultRow .= '<h4>New Section</h4>';
      $resultRow .= '<b>Title</b> <input type = "text" name = "newTitle" class = "form-control" >';
      $resultRow .= '<b>Content</b>';
      $resultRow .= '<textarea name="newContent" id="newContent'.$row["lang_id"].'" rows="10" cols="80">';
      $resultRow .= '</textarea>';
      $resultRow .= '<script>';
      $resultRow .= 'CKEDITOR.replace( "newContent'.$row["lang_id"].'" );';
      $resultRow .= '</script>';
      $resultRow .= '</div>';
      $resultRow .= '</div>';

    return $resultRow;
  }

  function InsertAbout($title, $content, $lang_id)
  {
    mysqli_query($link, "insert into about_setting (title, content, lang_id) values ('$title', '$content', '$lang_id')") or die (mysql_error());
  }

  function UpdateAbout($title, $content, $about_id)
  {
    mysqli_query($link, "update about_setting set title = '$title', content = '$content' where about_id = '$about_id' ") or die (mysql_error());
  }

  function DeleteAbout($about_id)
  {
    mysqli_query($link, "delete from about_setting where about_id = '$about_id' ") or die (mysql_error());
  }

  function ReturnAboutID()
  {
    $aboutIDArray = array();
    $result = mysqli_query($link, "select about_id from about_setting order by about_id") or die(mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $aboutIDArray[] = $row["about_id"];
    }
    return $aboutIDArray;
  }

  function GetAbout($lang_id)
  {
    $resultRow = '';
    $result = mysqli_query($link, "select title, content from about_setting where lang_id = '$lang_id'") or die(mysql_error());
    $second = 0.5;
    while($row = mysqli_fetch_array($result))
    {
      $second += 0.2;
      if($row["title"] != "")
      {
        $resultRow .= '<h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">'.$row["title"].'</h3>';
      }
      $resultRow .= str_replace('<p>', '<p  class="wow fadeInUp" data-wow-delay="'.$second.'s" data-wow-duration="500ms">', $row["content"]);

    }
    return $resultRow;
  }
}


$aboutClass = new AboutClass();
?>
