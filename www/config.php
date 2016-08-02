<?php 
$root = dirname(__FILE__) . "/";
include $root . "src/Parsers/Components.php";
include $root . "src/Parsers/Colors.php";
include $root . "src/Parsers/Typography.php";

$projectName = "Dummy Project 2";
$sassPath = "dummy-project/sass/";
$componentsPath = "dummy-project/components/";
$compiledCSS = "dummy-project/css/application.css";
$compiledJS = "dummy-project/js/application.js";
$showColors = false;
$colorsFile = "colors.sass";
$showTypography = false;
$typographyFile = "typography.sass";
$settingsPage = false;