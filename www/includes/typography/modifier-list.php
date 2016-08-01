<select data-element="custom-select">
    <option value="<?php echo $item["name"]; ?>-default"><?php echo $item["class"]; ?></option>
    <?php foreach($item["modifiers"] as $modifier) : ?>
        <option value="<?php echo $item["name"]."-".$modifier; ?>">
            <?php echo $item["class"]."--".$modifier; ?> 
        </option>
    <?php endforeach; ?>
</select>