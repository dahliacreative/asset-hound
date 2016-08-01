<div class="ah-tabs">
    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-example">
        <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]."-".$modifier["modifier"]; ?>">
            <div class="ah-grid ah-grid--wrap">
                <?php for ($i=0; $i < $component["columns"]; $i++) : ?>
                    <div class="ah-grid__item">
                        <?php echo $modifier["evalMarkup"]; ?>
                    </div>
                <?php endfor ?>
            </div>
        </div>
        <?php 
            foreach($component["modifiers"] as $modifier) {
                include $root."includes/component/example.php";
            }
        ?>
    </div>

    <div class="ah-component__tab" id="<?php echo $component["class"]; ?>-usage">
        <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-default">
            <pre><code><?php echo trim(htmlspecialchars($component["c5Include"])); ?></code></pre>
        </div>
        <?php 
            foreach($component["modifiers"] as $modifier) {
                include $root."includes/component/usage.php";
            }
        ?>
    </div>

    <div class="ah-component__tab" id="<?php echo $component["class"]; ?>-markup">
        <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-default">
            <pre><code><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></code></pre>
        </div>
        <?php 
            foreach($component["modifiers"] as $modifier) {
                include $root."includes/component/markup.php";
            }
        ?>
    </div>

    <div class="ah-component__tab" data-tab="<?php echo $component["class"]; ?>-comments">
        <pre><code><?php echo trim(htmlspecialchars($component["comments"])); ?></code></pre>
    </div>
</div>