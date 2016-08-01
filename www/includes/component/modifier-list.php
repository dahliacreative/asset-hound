<select data-element="ah-custom-select" data-behaviour="ah-modifier-list">
    <option value="ah-<?php echo $component["class"]; ?>-default">.<?php echo $component["class"]; ?></option>
    <?php foreach($component["modifiers"] as $modifier) : ?>
        <option value="ah-<?php echo $component["class"]."-".$modifier["modifier"] ?>">
            <?php echo ".".$component["class"]."--".$modifier["modifier"] ?>
        </option>
    <?php endforeach; ?>
</select>