<select data-element="ah-custom-select" data-behaviour="ah-modifier-list">
    <option value="ah-<?php echo $item["name"]; ?>-default"><?php echo $item["class"]; ?></option>
    <?php foreach($item["modifiers"] as $modifier) : ?>
        <option value="ah-<?php echo $item["name"]."-".$modifier; ?>">
            <?php echo $item["class"]."--".$modifier; ?> 
        </option>
    <?php endforeach; ?>
</select>