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
                <header class="ah-section__header">
                    <h1 class="ah-section__title">Project Settings</h1>
                </header>
                <form action="config/save-settings.php" method="POST" class="ah-form">
                    <div class="ah-form__control">
                        <input type="text" class="ah-form__input" value="<?php echo $projectName ?>" name="projectName">
                        <label class="ah-form__label">Project Name</label>
                    </div>

                    <header class="ah-section__header">
                        <h1 class="ah-section__title">Source Files</h1>
                    </header>

                    <div class="ah-form__control">
                        <input type="text" class="ah-form__input" value="<?php echo $sassPath ?>" name="sassPath">
                        <label class="ah-form__label">SASS Files Path</label>
                    </div>

                    <div class="ah-form__control">
                        <input type="text" class="ah-form__input" value="<?php echo $componentsPath ?>" name="componentsPath">
                        <label class="ah-form__label">Components Path</label>
                    </div>

                    <header class="ah-section__header">
                        <h1 class="ah-section__title">Compiled Files</h1>
                    </header>

                    <div class="ah-form__control">
                        <input type="text" class="ah-form__input" value="<?php echo $compiledCSS ?>" name="compiledCSS">
                        <label class="ah-form__label">Compiled CSS Path</label>
                    </div>

                    <div class="ah-form__control">
                        <input type="text" class="ah-form__input" value="<?php echo $compiledJS ?>" name="compiledJS">
                        <label class="ah-form__label">Compiled JS Path</label>
                    </div>

                    <header class="ah-section__header">
                        <h1 class="ah-section__title">Styleguide Options</h1>
                    </header>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Display Color Pallete?</label>
                        <div class="ah-toggle">
                            No
                            <input id="ah-show-colors" type="checkbox" class="ah-toggle__input" name="showColors" <?php if($showColors) { echo "checked"; }?> data-behaviour="toggle-field" data-field="#ah-colors">
                            <label for="ah-show-colors" class="ah-toggle__label"></label>
                            Yes
                        </div>
                    </div>

                    <div id="ah-colors">
                        <div class="ah-form__control">
                            <input type="text" class="ah-form__input" value="<?php echo $colorsFile ?>" name="colorsFile">
                            <label class="ah-form__label">Colors File</label>
                        </div>
                    </div>

                    <div class="ah-form__control">
                        <label class="ah-form__label">Display Color Pallete?</label>
                        <div class="ah-toggle">
                            No
                            <input id="ah-show-typography" type="checkbox" class="ah-toggle__input" name="showTypography" <?php if($showTypography) { echo "checked"; }?> data-behaviour="toggle-field" data-field="#ah-typography">
                            <label for="ah-show-typography" class="ah-toggle__label"></label>
                            Yes
                        </div>
                    </div>

                    <div id="ah-typography">
                        <div class="ah-form__control">
                            <input type="text" class="ah-form__input" value="<?php echo $typographyFile ?>" name="typographyFile">
                            <label class="ah-form__label">Typography File</label>
                        </div>
                    </div>

                    <div class="ah-form__control ah-form__control--save">
                        <button type="submit" class="ah-button">Save Settings</button>
                    </div>
                </form>
            </section>

        </div>
    </div>

    </body>
</html>