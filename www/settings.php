<?php include 'config.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asset Hound</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="app/stylesheets/application.css" />
        <script src="app/javascript/application.js"></script>
    </head>
    <body>

    <div class="ah">
        <?php $settingsPage = true; ?>
        <?php include 'includes/header.php' ?>
        <?php include 'includes/navigation.php' ?>
        <div class="ah-page">

            <section class="ah-section">
                <form action="config/save-settings.php" method="POST" class="ah-form">
                    <div class="ah-form__control">
                        <label class="ah-form__label">Project Name</label>
                        <input type="text" class="ah-form__input" value="<?php echo $projectName ?>" name="projectName">
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">SASS Files Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $sassPath ?>" name="sassPath">
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Components Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $componentsPath ?>" name="componentsPath">
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Compile CSS Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $compiledCSS ?>" name="compiledCSS">
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Compile JS Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $compiledJS ?>" name="compiledJS">
                    </div>

                    <div class="ah-form__control">
                        <input id="show-colors" type="checkbox" class="ah-form__checkbox" name="showColors" <?php if($showColors) { echo "checked"; }?> data-behaviour="ah-update-value">
                        <label for="show-colors" class="ah-form__label">Display Color Pallete?</label>
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Colors File Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $colorsFile ?>" name="colorsFile">
                    </div>

                    <div class="ah-form__control">
                        <input id="show-typography" type="checkbox" class="ah-form__checkbox" name="showTypography" <?php if($showTypography) { echo "checked"; }?> data-behaviour="ah-update-value">
                        <label for="show-typography" class="ah-form__label">Display Color Pallete?</label>
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Typography File Path</label>
                        <input type="text" class="ah-form__input" value="<?php echo $typographyFile ?>" name="typographyFile">
                    </div>

                    <div class="ah-form__control">
                        <button type="submit" class="ah-button">Save Settings</button>
                    </div>
                </form>
            </section>

        </div>
    </div>

    </body>
</html>