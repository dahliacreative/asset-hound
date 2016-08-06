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
    <?php foreach($component['vars'] as $key=>$var) : ?>
    	<div class="ah-form__control">
        	<input type="text" class="ah-form__input" value="text(5)" name=<?php echo $key; ?> data-behaviour="populate-fields" data-fields="<?php echo $component["class"] ?>-<?php echo $key; ?>">
        	<label class="ah-form__label"><?php echo $var; ?></label>
	    </div>
    <?php endforeach; ?>	    

    <h4 class="ah-form__title">Modifier Attributes</h4>
     <fieldset class="ah-form__fieldset">
        <h4 class="ah-form__title">.<?php echo $component["class"] ?></h4>
        <?php foreach($component['vars'] as $key=>$var) : ?>
	        <div class="ah-form__control">
	            <textarea 
	                class="ah-form__input ah-form__input--nested"
	                type="text" 
	                id="<?php echo $component["class"] ?>-<?php echo $key; ?>" 
	                data-field="<?php echo $component["class"] ?>-<?php echo $key; ?>" 
	                name="<?php echo $component['class'] ?>[data][default][<?php echo $key; ?>]"></textarea>
	            <label class="ah-form__label">Display <?php echo $key; ?>?</label>
	            <div class="ah-toggle">
	                Yes
	                <input 
	                    id="ah-<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>" 
	                    type="checkbox" class="ah-toggle__input"
	                    data-behaviour="toggle-field" 
	                    data-reverse-toggle="true"
	                    data-field="#<?php echo $component["class"] ?>-<?php echo $key; ?>" 
	                    name="<?php echo $component['class'] ?>[data][default][<?php echo $key; ?>]" 
	                    value="false">
	                <label for="ah-<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>" class="ah-toggle__label"></label>
	                No
	            </div>
	        </div>
        <?php endforeach; ?>
    </fieldset>


    <?php foreach ($component["modifiers"] as $modifier) : ?>
        <fieldset class="ah-form__fieldset">
            <h4 class="ah-form__title">.<?php echo $component["class"]."--".$modifier["modifier"] ?></h4>
            <?php foreach($component['vars'] as $key=>$var) : ?>
	            <div class="ah-form__control">
	                <input 
	                    type="text" 
	                    class="ah-form__input ah-form__input--nested" 
	                    id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-<?php echo $key; ?>" 
	                    data-field="<?php echo $component["class"] ?>-<?php echo $key; ?>" 
	                    name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][<?php echo $key; ?>]">
	                <label class="ah-form__label">Display <?php echo $key; ?>?</label>
	                <div class="ah-toggle">
	                    Yes
	                    <input 
	                        id="<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>" 
	                        type="checkbox" class="ah-toggle__input"
	                        data-behaviour="toggle-field" 
	                        data-reverse-toggle="true"
	                        data-field="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-<?php echo $key; ?>"
	                        value="false"
	                        name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][<?php echo $key; ?>]">
	                    <label for="<?php echo $modifier["modifier"] ?>-show-<?php echo $key ?>" class="ah-toggle__label"></label>
	                    No
	                </div>
	            </div>
            <?php endforeach; ?>
        </fieldset>
    <?php endforeach; ?>

    <div class="ah-form__control ah-form__control--save">
        <button type="submit" class="ah-button">Save Config</button>
    </div>
</form>
