<form class="ah-form" data-behaviour="save-component" data-action="config/save-component.php">
    
    <h4 class="ah-form__title">Asset Hound Config</h4>
    <div class="ah-form__control">
        <div class="ah-form__well">
            <select name="<?php echo $component['class'] ?>[columns]" data-element="ah-custom-select">
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
        <textarea name="<?php echo $component['class'] ?>[comments]" class="ah-form__input ah-form__input--textarea"></textarea>
        <label class="ah-form__label">Comments</label>
    </div>


    <h4 class="ah-form__title">Component Attribute Defaults</h4>
    <!-- For each var in component -->
    <div class="ah-form__control">
        <input type="text" class="ah-form__input" value="text(5)" data-behaviour="populate-fields" data-fields="<?php echo $component["class"] ?>-title">
        <label class="ah-form__label">Title</label>
    </div>


    <h4 class="ah-form__title">Modifier Attributes</h4>
     <fieldset class="ah-form__fieldset">
        <h4 class="ah-form__title">.<?php echo $component["class"] ?></h4>
        <div class="ah-form__control">
            <input 
                class="ah-form__input ah-form__input--nested"
                type="text" 
                id="<?php echo $component["class"] ?>-title" 
                data-field="<?php echo $component["class"] ?>-title" 
                name="<?php echo $component['class'] ?>[data][default][title]"/>
            <label class="ah-form__label">Display Title?</label>
            <div class="ah-toggle">
                Yes
                <input 
                    id="ah-<?php echo $modifier["modifier"] ?>-show-title" 
                    type="checkbox" class="ah-toggle__input"
                    data-behaviour="toggle-field" 
                    data-reverse-toggle="true"
                    data-field="#<?php echo $component["class"] ?>-title" 
                    name="<?php echo $component['class'] ?>[data][default][title]" 
                    value="false">
                <label for="ah-<?php echo $modifier["modifier"] ?>-show-title" class="ah-toggle__label"></label>
                No
            </div>
        </div>
    </fieldset>


    <?php foreach ($component["modifiers"] as $modifier) : ?>
        <fieldset class="ah-form__fieldset">
            <h4 class="ah-form__title">.<?php echo $component["class"]."--".$modifier["modifier"] ?></h4>
            <!-- For each var in component -->
            <div class="ah-form__control">
                <input 
                    type="text" 
                    class="ah-form__input ah-form__input--nested" 
                    id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-title" 
                    data-field="<?php echo $component["class"] ?>-title"
                    name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][title]">
                <label class="ah-form__label">Display Title?</label>
                <div class="ah-toggle">
                    Yes
                    <input 
                        id="ah-<?php echo $modifier["modifier"] ?>-show-title" 
                        type="checkbox" class="ah-toggle__input"
                        data-behaviour="toggle-field" 
                        data-reverse-toggle="true"
                        data-field="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-title"
                        value="false"
                        name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][title]">
                    <label for="ah-<?php echo $modifier["modifier"] ?>-show-title" class="ah-toggle__label"></label>
                    No
                </div>
            </div>
        </fieldset>
    <?php endforeach; ?>

    <div class="ah-form__control ah-form__control--save">
        <button type="submit" class="ah-button">Save Config</button>
    </div>
</form>
