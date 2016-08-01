<select data-element="custom-select">
    <option value="<?php echo $component["class"]; ?>-default">.<?php echo $component["class"]; ?></option>
      <?php foreach($component["modifiers"] as $modifier) : ?>
        <option value="<?php echo $component["class"]; ?>-<?php echo $modifier["modifier"] ?>">
            <?php echo ".".$component["class"]."--".$modifier["modifier"] ?>
        </option>
      <?php endforeach; ?>
</select>