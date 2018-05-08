<?php
include("interface1.php");
?>
<?php
for($i = 1; $i <= 5; $i++)
{
  if(isset($_POST["lang_code".$i]))
  {
    $lang_code = $_POST["lang_code".$i];
    $display_name = $_POST['display_name'.$i];
    if(isset($_POST['open'.$i]))
    {
      $open = 1;
    }
    else
    {
      $open = 0;
    }
    $lang_id = $i;
    $langClass->SaveLang($lang_code, $display_name , $open, $lang_id);
  }
}

?>
<script>
window.location = "language.php";
</script>
<?php
include("interface2.php");
?>
