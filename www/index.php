<?php include 'load-config.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asset Hound</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo $compiledCSS ?>" />
        <script src="<?php echo $compiledJS ?>"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="app/stylesheets/application.css" />
        <script src="app/javascript/application.js"></script>
    </head>
    <body>

    <div class="ah">
        <!-- TODO:
            ERROR CHECKING IF SETTNGS ARE INCORRECT DISPLAY MESSAGE WITH LINK TO SETTINGS PAGE!
        -->
        <?php include 'includes/notifications.php' ?>
        <?php include 'includes/header.php' ?>
        <?php include 'includes/navigation.php' ?>
        <div class="ah-page">
        <?php if($showColors) : ?>
            <?php include $root.'views/colors.php' ?>
        <?php endif; ?>
        <?php if($showTypography) : ?>
            <?php include $root.'views/typography.php' ?>
        <?php endif; ?>
        <?php include $root.'views/components.php' ?>
        </div>
    </div>

    </body>
</html>