<?php
require_once("interface1.php");
?>
<?php
$langIDArray = $langClass->GetLangIDArray();
for($i = 0; $i < sizeof($langIDArray); $i++)
{
  $metaTagClass->SaveMetaTag($_POST["keyword".$langIDArray[$i]], $_POST["description".$langIDArray[$i]], $langIDArray[$i]);
}
?>
<script>
window.location = 'metaTag.php';
</script>
<?php
require_once("interface2.php");
?>
