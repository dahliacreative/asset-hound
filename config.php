<?php 
  error_reporting(0);
  $root = dirname(__FILE__) . "/";
  include $root . 'src/Parsers/Components.php';

  // Project Name
  $projectName = 'Dummy Project';
  
  // Paths
  $sassPath = $root . 'dummy-project/sass/';
  $componentsPath = $root . 'dummy-project/components/';

  // Compiled Files
  $compiledCSS = 'dummy-project/css/application.css';
  $compiledJS = 'dummy-project/js/application.js';

  // Sass Files
  $showColors = true;
  $colorsFile = 'colors.sass';

  $showTypography = true;
  $typographyFile = 'typography.sass';