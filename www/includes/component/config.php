<form action="config/save-component.php" method="POST" class="ah-form">
    

    <input type="hidden" name="component" value="<?php echo $component['class'] ?>">
    <h4 class="ah-form__title">Asset Hound Config</h4>
    <div class="ah-form__control">
        <div class="ah-form__well">
            <select name="columns" data-element="ah-custom-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <label class="ah-form__label">Display columns</label>
    </div>
    <div class="ah-form__control ah-form__control--tall">
        <textarea name="comments" class="ah-form__input ah-form__input--textarea"></textarea>
        <label class="ah-form__label">Comments</label>
    </div>


    <h4 class="ah-form__title">Component Attributes</h4>
    <!-- For each var in component -->
    <div class="ah-form__control">
        <input type="text" class="ah-form__input" value="text(5)" name="titleText" data-behaviour="populate-fields" data-fields="<?php echo $component["class"] ?>-title">
        <label class="ah-form__label">Title</label>
    </div>


    <h4 class="ah-form__title">Modifier Attributes</h4>
     <fieldset class="ah-form__fieldset">
        <h4 class="ah-form__title">.<?php echo $component["class"] ?></h4>
        <div class="ah-form__control">
            <label class="ah-form__label">Display Title?</label>
            <div class="ah-form__well">
                <div class="ah-toggle">
                    No
                    <input id="ah-<?php echo $component["class"] ?>-show-title" type="checkbox" class="ah-toggle__input" name="<?php echo $component["class"] ?>-showTitle" <?php if($$component["class"]."showTitle") { echo "checked"; }?> >
                    <label for="ah-<?php echo $component["class"]?>-show-title" class="ah-toggle__label"></label>
                    Yes
                </div>
            </div>
        </div>
    </fieldset>


    <?php foreach ($component["modifiers"] as $modifier) : ?>
        <fieldset class="ah-form__fieldset">
            <h4 class="ah-form__title">.<?php echo $component["class"]."--".$modifier["modifier"] ?></h4>
            <!-- For each var in component -->
            <div class="ah-form__control">
                <input type="text" class="ah-form__input ah-form__input--nested" id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-title" data-field="<?php echo $component["class"] ?>-title">
                <label class="ah-form__label">Display Title?</label>
                <div class="ah-toggle">
                    No
                    <input id="ah-<?php echo $modifier["modifier"] ?>-show-title" type="checkbox" class="ah-toggle__input" name="<?php echo $modifier["modifier"] ?>-showTitle" <?php if($$modifier["modifier"]."showTitle") { echo "checked"; }?> data-behaviour="toggle-field" data-field="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-title">
                    <label for="ah-<?php echo $modifier["modifier"] ?>-show-title" class="ah-toggle__label"></label>
                    Yes
                </div>
            </div>
        </fieldset>
    <?php endforeach; ?>
</form>