<?php
class NewsClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }
    
  function GetNewsSetting()
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select display_name, lang_id from lang_setting") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<h3>'.$row["display_name"].'</h3>';
      $resultRow .= '<table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">';
      $resultRow .= '<thead>';
      $resultRow .= '<tr><td>Title</td><td>Status</td></tr>';
      $resultRow .= '</thead>';
      $lang_id = $row["lang_id"];
      $result2 = mysqli_query($link, "select * from news where lang_id = '$lang_id'") or die (mysqli_error());

      while($row2 = mysqli_fetch_array($result2))
      {
        $resultRow .= '<tr>';
        $title = $row2["news_title"];
        if($title == '')
        {
          $title = 'No Name';
        }
        $resultRow .= '<td><a href = "news_detail.php?news_id='.$row2["news_id"].'">'.$title.'</td>';

        if($row2["status"] == 0)
        {
          $resultRow .= '<td>Draft</td>';
        }
        else
        {
          $resultRow .= '<td>Published</td>';
        }
        $resultRow .= '</tr>';
      }

      $resultRow .= '</table>';

    }
    return $resultRow;
  }

  function CreateNews()
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "insert into news (news_title, lang_id, status, image_path) values ('', 1, 0, '')") or die (mysqli_error());
    $news_id = mysqli_insert_id($link);
    return $news_id;
  }

  function GetNewsInfo($news_id)
  {
    $link = $this->Connection->ConnectDB();
    $news = Array();
    $result = mysqli_query($link, "select * from news where news_id = '$news_id'") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $news[] = $row["news_title"];
      $result2 = mysqli_query($link, "select * from lang_setting") or die (mysqli_error());
      $option = '';
      while($row2 = mysqli_fetch_array($result2))
      {
        if($row["lang_id"] == $row2["lang_id"])
        {
            $option .= '<option value = "'.$row2["lang_id"].'" selected>'.$row2["display_name"].'</option>';
        }
        else
        {
            $option .= '<option value = "'.$row2["lang_id"].'">'.$row2["display_name"].'</option>';
        }
      }
      $news[] = $option;
      $control = '';
      if($row["status"] == 0)
      {
        $control .= '<a href = "news_publish.php?news_id='.$news_id.'&action=1" class="btn btn-primary">Set to Publish</a>';
      }
      else {
        $control .= '<a href = "news_publish.php?news_id='.$news_id.'&action=0" class="btn btn-danger">Set to Draft</a>';

      }
      $news[] = $control;
      $news[] = $row["image_path"];
    }
    return $news;
  }

  function GetNewsDetail($news_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select * from news_section where news_id = '$news_id' order by section_id") or die(mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<h4>Section #'.$row["section_id"].'</h4>';
      $resultRow .= '<a href ="news_section_delete.php?section_id='.$row["section_id"].'&news_id='.$news_id.'" class="btn btn-danger">Delete</a>';
      $resultRow .= '<div class="row">';
        $resultRow .= '<div class = "col-md-12" style="padding-bottom:5px;">';
          $resultRow .= '<textarea name="section'.$row["section_id"].'" id="section'.$row["section_id"].'" rows="10" cols="80">';
          $resultRow .= $row["content"];
          $resultRow .= '</textarea>';
          $resultRow .= '<script>';
          $resultRow .= 'CKEDITOR.replace( "section'.$row["section_id"].'" );';
          $resultRow .= '</script>';
        $resultRow .= '</div>';
      $resultRow .= '</div>  ';

    }
    $resultRow .= '<h4>News Section</h4>';
    $resultRow .= '<div class="row">';
      $resultRow .= '<div class = "col-md-12" style="padding-bottom:5px;">';
        $resultRow .= '<textarea name="newsection" id="newsection" rows="10" cols="80">';

        $resultRow .= '</textarea>';
        $resultRow .= '<script>';
        $resultRow .= 'CKEDITOR.replace( "newsection" );';
        $resultRow .= '</script>';
      $resultRow .= '</div>';
    $resultRow .= '</div>  ';
    return $resultRow;
  }

  function SaveNewsCoverPhoto($news_id, $photo_path)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update news set image_path = '$photo_path' where news_id = '$news_id'") or die(mysqli_error());
  }

  function UpdateNewsInfo($news_id, $news_title, $lang_id)
  {
    $link = $this->Connection->ConnectDB();
    $news_title = str_replace("'","\'", $news_title);
    mysqli_query($link, "update news set news_title = '$news_title', lang_id = '$lang_id' where news_id = '$news_id'") or die(mysqli_error());
  }

  function InsertNewsSection($news_id, $content)
  {
    $link = $this->Connection->ConnectDB();
    $content = str_replace("'","\'", $content);
    mysqli_query($link, "insert into news_section (news_id, content) values ('$news_id', '$content')") or die (mysqli_error());
  }

  function UpdateNewsSection($section_id, $content)
  {
    $link = $this->Connection->ConnectDB();
    $content = str_replace("'","\'", $content);
    mysqli_query($link, "update news_section set content = '$content' where section_id = '$section_id'") or die(mysqli_error());
  }

  function DeleteNewsSection($section_id)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "delete from news_section where section_id = '$section_id'") or die(mysqli_error());
  }

  function GetNewsSectionIDArray($news_id)
  {
    $sectionIDArray = Array();
    $result = mysqli_query($link, "select section_id from news_section where news_id = '$news_id'") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $sectionIDArray[] = $row["section_id"];
    }
    return $sectionIDArray;
  }

  function DeleteNewsCoverImage($news_id)
  {
    $link = $this->Connection->ConnectDB();
    $result = mysqli_query($link, "select image_path from news where news_id = '$news_id'") or die(mysqli_error());
    $image_path = mysqli_fetch_object($result)->image_path;
    mysqli_query($link, "update news set image_path = '' where news_id= '$news_id'") or die (mysqli_error());
    unlink($image_path);
  }

  function PublishNews($news_id, $action)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update news set status = '$action' where news_id = '$news_id'")  or die(mysqli_error());
  }

  function GetNews($lang_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select * from news where status = 1 and lang_id = '$lang_id' order by news_id desc") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<div class="col-sm-3 col-xs-12 item">';
      $resultRow .= '<figure class="wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">';
      $resultRow .= '<a href="/news-article/'.$row["news_id"].'">';
      $resultRow .= '<div class="img-wrapper">';
      $resultRow .= '<img src="/'.$row["image_path"].'" class="img-responsive" alt="'.$row["news_title"].'" >';
      $resultRow .= '</div>';
      $resultRow .= '<figcaption>';
      $resultRow .= '<h4>'.$row["news_title"].'</h4>';
      $news_id = $row["news_id"];
      $result2 = mysqli_query($link, "select content from news_section where news_id = '$news_id' order by section_id asc limit 1") or die(mysqli_error());
      if($row2 = mysqli_fetch_array($result2))
      {
          $resultRow .= '<p>'.$row2["content"].'</p>';
      }

      $resultRow .= '</figcaption>';
      $resultRow .= '</a>';
      $resultRow .= '</figure>';
      $resultRow .= '</div>';
    }
    return $resultRow;
  }

  function News($news_id)
  {
    $link = $this->Connection->ConnectDB();
    $news = Array();
    $result = mysqli_query($link, "select image_path from news where news_id = '$news_id'") or die(mysqli_error());
    if($row = mysqli_fetch_array($result))
    {
      $news[] = $row["image_path"];
    }
    $content = '';
    $result = mysqli_query($link, "select content from news_section where news_id = '$news_id' order by section_id") or die(mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $content .= $row["content"];
    }
    $news[] = $content;
    return $news;
  }
}
$newsClass = new NewsClass($connectionClass);
?>
