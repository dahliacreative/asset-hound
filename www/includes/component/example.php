<div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]."-".$modifier["modifier"]; ?>">
    <div class="ah-grid ah-grid--wrap">
        <?php for ($i=0; $i < $component["columns"]; $i++) : ?>
            <div class="ah-grid__item">
                <?php echo $modifier["evalMarkup"]; ?>
            </div>
        <?php endfor ?>
    </div>
</div>