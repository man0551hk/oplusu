<?php
class LangClass
{
  private $Connection;
  public function __construct($connectionClass)
  {
    $this->Connection = $connectionClass;
  }
  function GetLangSetting() {
    $link = $this->Connection->ConnectDB();
    $result = mysqli_query($link, "select * from lang_setting");
    while($row = mysqli_fetch_array($result))
    {
      $returnRow .= '<tr>';
      $returnRow .= '<td>'.$row["lang_id"].'</td>';
      $returnRow .= '<td><input type = "text" name = "lang_code'.$row["lang_id"].'" value ="'.$row["lang_code"].'" class = "form-control"/></td>';
      $returnRow .= '<td><input type = "text" name = "display_name'.$row["lang_id"].'" value ="'.$row["display_name"].'" class = "form-control"/></td>';
      if($row["open"] == 1)
      {
        $returnRow .= '<td><input type = "checkbox" name = "open'.$row["lang_id"].'" checked/></td>';
      }
      else
      {
        $returnRow .= '<td><input type = "checkbox" name = "open'.$row["lang_id"].'" /></td>';
      }

      $returnRow .= '</tr>';
    }
    return $returnRow;
  }

  function SaveLang($lang_code, $display_name, $open, $lang_id )
  {
    $link = $this->Connection->ConnectDB();
    $sql = "update lang_setting set lang_code = '$lang_code', display_name = '$display_name', open = '$open' where lang_id = '$lang_id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error());
    return $open;
  }

  function GetCookieLang()
  {
    $link = $this->Connection->ConnectDB();
    $lang_id = '';
    $lang_code = 'EN'; //default
    if(!isset($_COOKIE['lang'])) {
      $this->SaveCookieLang('EN'); //default
    }
    else {
      $this->SaveCookieLang($_COOKIE['lang']);
      $lang_code = $_COOKIE['lang'];
    }

    if(strlen($lang_code) <= 2)
    {
      $result = mysqli_query($link, "select lang_id from lang_setting where lang_code = '$lang_code'") or die(mysqli_error());
      $lang_id = mysqli_fetch_object($result)->lang_id;
    }

    return $lang_id;
  }

  function SaveCookieLang($lang)
  {
    setcookie('lang', $lang, time() + (86400 * 30), "/");
  }

  function LangDropDown($lang_id)
  {
    $link = $this->Connection->ConnectDB();
    $returnRow = '';

    $result = mysqli_query($link, "select * from lang_setting") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      if($row["lang_id"] == $lang_id)
      {
        $returnRow .= '<option value = "'.$row["lang_id"].'" selected>'.$row["display_name"].'</option>';
      }
      else
      {
        $returnRow .= '<option value = "'.$row["lang_id"].'">'.$row["display_name"].'</option>';
      }

    }
    return $returnRow;
  }

  function GetLangIDArray()
  {
    $link = $this->Connection->ConnectDB();
    $langIDArray = Array();
    $result = mysqli_query($link, "select lang_id from lang_setting") or die (mysqli_error());
    while($row = mysqli_fetch_array($result))
    {
      $langIDArray[] = $row["lang_id"];
    }
    return $langIDArray;
  }

  function GetLangCode($currLang_id)
  {
    $link = $this->Connection->ConnectDB();
    $resultRow = '';
    $result = mysqli_query($link, "select lang_code from lang_setting where lang_id = '$currLang_id'") or die (mysqli_error());
    if($row = mysqli_fetch_array($result))
    {
      $resultRow = $row["lang_code"];
    }
    return $resultRow;
  }
}

$langClass = new LangClass($connectionClass);
?>
