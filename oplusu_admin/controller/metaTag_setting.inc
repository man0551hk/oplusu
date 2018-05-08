<?php
class MetaTagClass
{
  function GetMetaTagSetting()
  {
    $resultRow = '';
    $result = mysqli_query($link, "select * from lang_setting") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $lang_id = $row["lang_id"];
      $display_name = $row["display_name"];
      $result2 = mysqli_query($link, "select * from meta_tag_setting where lang_id = '$lang_id'") or die (mysql_error());
      if($row2 = mysqli_fetch_array($result2))
      {
        $resultRow .= '<tr><td><b>'.$display_name.'</b></td></tr>';
        $resultRow .= '<tr><td>Keyword</td><td><input type = "text" name ="keyword'.$lang_id.'" class="form-control" value = "'.$row2["keyword"].'"/></td></tr>';
        $resultRow .= '<tr><td>Description</td><td><input type = "text" name ="description'.$lang_id.'"  class="form-control" value = "'.$row2["description"].'"/></td></tr>';
      }
      if (mysql_num_rows($result2)==0)
      {
        $resultRow .= '<tr><td><b>'.$display_name.'</b></td></tr>';
        $resultRow .= '<tr><td>Keyword</td><td><input type = "text" name ="keyword'.$lang_id.'" class="form-control"/></td></tr>';
        $resultRow .= '<tr><td>Description</td><td><input type = "text" name ="description'.$lang_id.'"  class="form-control"/></td></tr>';
        //<input type= "text" name = meta';
      }
    }
    return $resultRow;
  }

  function SaveMetaTag($keyword, $description, $lang_id)
  {
    $keyword = str_replace("'","\'", $keyword);
    $description = str_replace("'","\'", $description);
    $result = mysqli_query($link, "select * from meta_tag_setting where lang_id = '$lang_id'") or die (mysql_error());
    if (mysql_num_rows($result)==0)
    {
      mysqli_query($link, "insert into meta_tag_setting (keyword, description, lang_id) values ('$keyword', '$description', '$lang_id')")  or die (mysql_error());
    }
    else
    {
      mysqli_query($link, "update meta_tag_setting set keyword ='$keyword', description = '$description' where lang_id = '$lang_id'")  or die (mysql_error());
    }
  }

  function GetMetaTag($currLang_id)
  {
    $keyword = '';
    $description = '';
    $result = mysqli_query($link, "select keyword, description from meta_tag_setting where lang_id = '$currLang_id'") or die (mysql_error());
    if($row = mysqli_fetch_array($result))
    {
      $keyword = $row["keyword"];
      $description = $row["description"];
    }
    return Array($keyword, $description);
  }

  function GetProjectTitle($currLang_id, $project_id)
  {
    $project_title = '';
    $result = mysqli_query($link, "select project_title from project_title where project_id = '$project_id' and lang_id = '$currLang_id'") or die (mysql_error());
    if($row  = mysqli_fetch_array($result))
    {
      $project_title = $row["project_title"];
    }
    return $project_title;
  }

  function GetNewsTitle($news_id)
  {
    $news_title = '';
    $result = mysqli_query($link, "select news_title from news where news_id = '$news_id'") or die (mysql_error());
    if($row  = mysqli_fetch_array($result))
    {
      $news_title = $row["news_title"];
    }
    return $news_title;
  }

  function GetPageName($pageName, $lang_id)
  {
    $url = '';
    if (strpos($pageName, 'about.php') !== false) {
        $url = 'about.php';
    }
    else if (strpos($pageName, 'gallery.php') !== false) {
        $url = 'gallery.php';
    }
    else if (strpos($pageName, 'project_detail.php') !== false) {
        $url = 'gallery.php';
    }
    else if (strpos($pageName, 'news.php') !== false) {
        $url = 'news.php';
    }
    else if (strpos($pageName, 'news_detail.php') !== false) {
        $url = 'news.php';
    }
    else if (strpos($pageName, 'contact.php') !== false) {
        $url = 'contact.php';
    }
    $name = '';
    $result = mysqli_query($link, "select name from menu where lang_id = '$lang_id' and url = '$url'") or die (mysql_error());
    if($row = mysqli_fetch_array($result))
    {
      $name = $row["name"]. ' | ';
    }
    return $name;
  }
}
$metaTagClass = new MetaTagClass();
?>
