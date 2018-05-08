<?php
include 'interface1.php';

for($i = 1; $i <= 21; $i++)
{
    $name = $_POST["name".$i];
    $status = 0;
    if(isset($_POST["status".$i]))
    {
      $status = 1;
    }
    $menuClass->SaveMenuSetting($i, $name, $status);
}
?>

<script>
window.location = "menu.php";
</script>
<?php
include("interface2.php");
?>
