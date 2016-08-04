<?php 
$root = dirname(__FILE__) . "/";
include $root . "src/Parsers/Components.php";
include $root . "src/Parsers/Colors.php";
include $root . "src/Parsers/Typography.php";

$projectName = "Dummy Project 3";
$sassPath = "dummy-project/sass/";
$componentsPath = "dummy-project/components/";
$compiledCSS = "dummy-project/css/application.css";
$compiledJS = "dummy-project/js/application.js";
$showColors = true;
$colorsFile = "colors.sass";
$showTypography = true;
$typographyFile = "typography.sass";
$settingsPage = false;