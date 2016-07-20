<?php include 'config.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Asset Hound</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo $compiledCSS ?>" />
    <script src="<?php echo $compiledJS ?>"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500" />
    <link rel="stylesheet" href="stylesheets/asset-hound.css" />
    <link rel="stylesheet" href="stylesheets/highlight.css" />
    <script src="javascripts/clipboard.js"></script>
    <script src="javascripts/highlight.js"></script>
    <script src="javascripts/asset-hound.js"></script>
  </head>
  <body>
    
    <?php include 'includes/header.php' ?>
    <?php include 'includes/navigation.php' ?>
    <?php if($showColors) : ?>
      <?php include 'templates/colors.php' ?>
    <?php endif; ?>
    <?php if($showTypography) : ?>
      <?php include 'templates/typography.php' ?>
    <?php endif; ?>
    <?php include 'templates/components.php' ?>
    
  </body>
</html>