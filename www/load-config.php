<?php
    
if(!file_exists('config.php')) {
    $handle = fopen('config.php', 'w') or die('Cannot create config.php, check permissions.');
    $contents = '<?php 
    $root = dirname(__FILE__) . "/";
    include $root . "src/Parsers/Components.php";
    include $root . "src/Parsers/Colors.php";
    include $root . "src/Parsers/Typography.php";

    $projectName = "Project Name";
    $sassPath = "/ui/app/stylesheets/";
    $componentsPath = "/application/themes/rawnet/components";
    $compiledCSS = "/application/themes/rawnet/app/stylesheets/application.css";
    $compiledJS = "/application/themes/rawnet/app/javascript/js.css";
    $showColors = true;
    $colorsFile = "settings/colors.sass";
    $showTypography = true;
    $typographyFile = "generic/typography.sass";
    $settingsPage = false;';
    fwrite($handle, $contents);
    fclose($handle);
    header("Location: settings.php");
} else {
    include 'config.php';
}