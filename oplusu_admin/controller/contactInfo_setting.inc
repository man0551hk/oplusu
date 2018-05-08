<?php
class ContactInfoClass
{
  function GetContactInfoSetting()
  {
    $resultRow = '';

    $result = mysqli_query($link, "select l.display_name, l.lang_id, a.address from lang_setting l left outer join address a on l.lang_id = a.lang_id") or die(mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<tr><td>' . $row["display_name"] . ' - Address</td><td><input type = "text" name = "address_'. $row["lang_id"] .'" value = "'.$row["address"].'" class = "form-control"/></td></tr>';
    }

    $result = mysqli_query($link, "select * from contact") or die(mysql_error());
    if($row = mysqli_fetch_array($result))
    {
      $resultRow .= '<tr><td>Contact Email</td><td><input type = "text" name = "email" value = "'.$row["email"].'" class = "form-control"/></td></tr>';
      $resultRow .= '<tr><td>Phone</td><td><input type = "text" name = "phone" value = "'.$row["phone"].'" class = "form-control"/></td></tr>';
      $resultRow .= '<tr><td>Recruit Email</td><td><input type = "text" name = "email2" value = "'.$row["email2"].'" class = "form-control"/></td></tr>';
      $resultRow .= '<tr><td>Lat</td><td><input type = "text" name = "lat" value = "'.$row["lat"].'" class = "form-control"/></td></tr>';
      $resultRow .= '<tr><td>Lon</td><td><input type = "text" name = "lon" value = "'.$row["lon"].'" class = "form-control"/></td></tr>';
    }
    return $resultRow;
  }

  function SaveAddress()
  {

    $result = mysqli_query($link, "select l.display_name, l.lang_id, a.address from lang_setting l left outer join address a on l.lang_id = a.lang_id") or die(mysql_error());
    while($row = mysqli_fetch_array($result))
    {
      $lang_id = $row["lang_id"];
      $address = $_POST['address_'. $lang_id];
      $address = str_replace("'","\'", $address);

      $checkIsExist = mysqli_query($link, "select * from address where lang_id = '$lang_id'") or die(mysql_error());
          if(mysqli_fetch_array($checkIsExist) == false) // insert
          {
            $insertSql = mysqli_query($link, "insert into address (address, lang_id) values ('$address', $lang_id)") or die (mysql_error());
            mysql_query($insertSql);
          }
          else //update
          {
            $updateSql = mysqli_query($link, "update address set address = '$address' where lang_id = $lang_id") or die (mysql_error());
            mysql_query($updateSql);
          }

    }
  }

  function SaveContactSetting($email, $phone, $email2, $lat, $lon)
  {
    $sql = "update contact set email = '$email', phone = '$phone', email2 = '$email2', lat = '$lat', lon = '$lon'";
    mysql_query($sql) or die(mysql_error());
    return $lon;
  }

  function GetContact($currLang_id)
  {

    $address = '';
    $email = '';
    $phone = '';
    $email2 = '';
    $lat = '';
    $lon = '';

    $result = mysqli_query($link, "select address from address where lang_id = '$currLang_id'");
    $address = mysqli_fetch_object($result)->address;

    $result = mysqli_query($link, "select * from contact") or die(mysql_error());
    if($row = mysqli_fetch_array($result))
    {
      $email =  $row["email"];
      $phone = $row["phone"];
      $email2 = $row["email2"];
      $lat = $row["lat"];
      $lon = $row["lon"];
    }
    $contact =  array($address, $email, $phone, $email2, $lat, $lon);



    return $contact;
  }
}

$ContactInfoClass = new ContactInfoClass();
?>
