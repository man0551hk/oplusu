<?php session_start();
include 'db.php';

if(isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["verifyCode"]))
{
  if($_POST["verifyCode"] == $_SESSION["vercode"])
  {
    $thislink = $connectionClass->ConnectDB();
    $login = $_POST["login"];
    $password = $_POST["password"];
    $result = mysqli_query($thislink, "select staff_id from staff where login = '$login' and password = '$password'") or die(mysqli_error());
    $staff_id = mysqli_fetch_object($result)->staff_id;
    if($staff_id != '')
    {

      $_SESSION["staff_id"] = $staff_id;
      ?>
      <script>
      console.log("<?php echo   $_SESSION["staff_id"];?>");
      window.location = "http://www.oplusu.net/oplusu_admin";
      </script>
      <?php
    }
    else
    {

      ?>
      <script>
      window.location = "http://www.oplusu.net/oplusu_admin/login.php";
      </script>
      <?php
    }
  }
}
else
{
  ?>
  <script>
  //window.location = "login.php";
  </script>
  <?php
}
?>
