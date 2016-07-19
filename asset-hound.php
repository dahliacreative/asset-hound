<?php include 'config.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Asset Hound</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500" />
    <link rel="stylesheet" href="stylesheets/asset-hound.css" />
  </head>
  <body>
    
    <header class="ah-header">
      <div>
        <h1 class="ah-header__title">Styleguide</h1>
        <p class="ah-header__project"><?php echo $projectName; ?></p>
      </div>
      <img src="http://placehold.it/150x50" alt="">
    </header>
    
    <?php include 'templates/colors.php' ?>
    <?php include 'templates/components.php' ?>
    
  </body>
</html>