<?php
class MenuClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }

  function GetMenu()
  {
    $menu = '';
    if (strpos($_SERVER["REQUEST_URI"], 'index.php') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="http://www.oplusu.net/oplusu_admin/"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'language') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="language.php"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"/></svg> Language</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'menu') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    //<svg class="glyph translucent folded-newspaper-no-image"><use xlink:href="#translucent-folded-newspaper-no-image"/></svg>
    $menu .= '<a href="menu.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Menu</a></li>';


    if (strpos($_SERVER["REQUEST_URI"], 'home') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Home</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'about') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="about.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> About</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'gallery_category.php') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="gallery_category.php"><svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></svg> Gallery Category</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'gallery.php') !== false || strpos($_SERVER["REQUEST_URI"], 'gallery_new.php') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="gallery.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Gallery</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'news') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="news.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"/></svg> News</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'contact') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="contact.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"/></svg> Contact</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'metagTag') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="metaTag.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Meta Tag</a></li>';

    if (strpos($_SERVER["REQUEST_URI"], 'social_media') !== false) {
        $menu .= '<li class="active">';
    }
    else {
      $menu .= '<li>';
    }
    $menu .= '<a href="social_media.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"/></svg> Social Media</a></li>';


    return $menu;
  }

  function GetMenuSetting()
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select display_name, lang_id from lang_setting") or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<h3>'.$row["display_name"].'</h3>';
      $resultRow .= '<table data-toggle="table" id="table-style" data-row-style="rowStyle" class="table table-hover">';
      $lang_id = $row["lang_id"];
      $result2 = mysqli_query($link, "select * from menu where lang_id = '$lang_id'") or die (mysql_error());
      $resultRow .= '<tr>';
      while($row2 = mysqli_fetch_array($result2))
      {

        $resultRow .= '<td>';
        $resultRow .= '<input type =  "text" value = "'.$row2["name"].'" name = "name'.$row2["id"].'" class="form-control">';
        if($row2["status"] == 1)
        {
          $resultRow .= '<input type = "checkbox" name = "status'.$row2["id"].'" checked>';
        }
        else
        {
          $resultRow .= '<input type = "checkbox" name = "status'.$row2["id"].'">';
        }
        $resultRow .= '</td>';

      }
      $resultRow .= '</tr>';
      $resultRow .= '</table>';

    }

    return $resultRow;
  }

  function SaveMenuSetting($id, $name, $status)
  {
    $link = $this->Connection->ConnectDB();
    mysqli_query($link, "update menu set name = '$name', status = '$status' where id='$id'") or die (mysql_error());
  }


  function GetFrontEndMenu($currLang_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $sql = "select url, name from menu where lang_id = '$currLang_id' and status = 1 order by id";
    if($_GET["allprojectson"] == "1")
    {
      $sql = "select url, name from menu where lang_id = '$currLang_id' and (status = 1 or url = 'gallery.php') order by id";
    }

    $result = mysqli_query($link, $sql) or die (mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      if($currLang_id != 1)
      {
        $langClass = new LangClass();
        $lang_code = strtolower($langClass->GetLangCode($currLang_id));
        if($_GET["allprojectson"] == "1")
        {
          $resultRow .= '<li><a href="/'.str_replace(".php", "", $row["url"]).'/'.$lang_code.'?allprojectson=1">'.$row["name"].'</a></li>';
        }
        else {
          $resultRow .= '<li><a href="/'.str_replace(".php", "", $row["url"]).'/'.$lang_code.'">'.$row["name"].'</a></li>';
        }
      }
      else {
        if($_GET["allprojectson"] == "1")
        {
          $resultRow .= '<li><a href="/'.str_replace(".php", "", $row["url"]).'?allprojectson=1">'.$row["name"].'</a></li>';

        }
        else {
          $resultRow .= '<li><a href="/'.str_replace(".php", "", $row["url"]).'">'.$row["name"].'</a></li>';
        }
      }

    }

    $sql = "select count(*) as totalLang from lang_setting where open = 1";
    $result2 = mysqli_query($link, $sql) or die(mysql_error());
    $totalLang = mysqli_fetch_object($result2)->totalLang;

    if($totalLang >  1)
    {
      $sql = "select display_name from lang_setting where lang_id = '$currLang_id'";
      $result2 = mysqli_query($link, $sql) or die(mysql_error());
      $display_name = mysqli_fetch_object($result2)->display_name;

      $resultRow .= '<li class="dropdown">';
      $resultRow .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$display_name.' <span class="caret"></span></a>';
      $resultRow .= '<div class="dropdown-menu">';
      $resultRow .= '<ul>';

      $sql = "select lang_code, display_name from lang_setting where open = 1 and lang_id != '$currLang_id'";
      $result = mysqli_query($link, $sql) or die (mysql_error());
      while($row = mysqli_fetch_array($result))
      {
        $resultRow .= '<li><a href=\'javascript:SetCookieLang("'.$row["lang_code"].'", "'.$_SERVER["REQUEST_URI"].'")\'>'.$row["display_name"].'</a></li>';
      }

      $resultRow .= '</ul>';
      $resultRow .= '</div>';
      $resultRow .= '</li>';
    }
    return 	$resultRow ;
  }
}
$menuClass  = new MenuClass($connectionClass);
?>
