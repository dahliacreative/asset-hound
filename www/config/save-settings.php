<?php 

if(isset($_POST['showColors']) && $_POST['showColors'] === 'on') {
    $displayColors = "true";
} else {
    $displayColors = "false";
}

if(isset($_POST['showTypography']) && $_POST['showTypography'] === 'on') {
    $displayTypo = "true";
} else {
    $displayTypo = "false";
}

$contents = '<?php 
$root = dirname(__FILE__) . "/";
include $root . "src/Parsers/Components.php";
include $root . "src/Parsers/Colors.php";
include $root . "src/Parsers/Typography.php";

$projectName = "'.$_POST["projectName"].'";
$sassPath = "'.$_POST["sassPath"].'";
$componentsPath = "'.$_POST["componentsPath"].'";
$compiledCSS = "'.$_POST["compiledCSS"].'";
$compiledJS = "'.$_POST["compiledJS"].'";
$showColors = '.$displayColors.';
$colorsFile = "'.$_POST["colorsFile"].'";
$showTypography = '.$displayTypo.';
$typographyFile = "'.$_POST["typographyFile"].'";
$settingsPage = false;';

// TODO: SOME ERROR CHECKING

file_put_contents("../config.php", $contents);
header('Content-type: application/json');
echo json_encode(["status"=>"200"]);