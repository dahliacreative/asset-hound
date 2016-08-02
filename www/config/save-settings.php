<?php 

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
$showColors = '.$_POST["showColors"].';
$colorsFile = "'.$_POST["colorsFile"].'";
$showTypography = '.$_POST["showTypography"].';
$typographyFile = "'.$_POST["typographyFile"].'";
$settingsPage = false;';

file_put_contents("../config.php", $contents);
header("Location: ../settings.php");