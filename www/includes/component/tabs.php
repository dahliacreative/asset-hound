<div class="ah-tabs">
    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-example">
        <div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]; ?>-default">
            <div class="ah-grid ah-grid--wrap">
                <?php for ($i=0; $i < $component["columns"]; $i++) : ?>
                    <div class="ah-grid__item">
                        <?php echo $component["evalMarkup"]; ?>
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

    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-usage">
        <div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]; ?>-default">
            <div class="ah-snippet">
                <pre><code><?php echo trim(htmlspecialchars($component["c5Include"])); ?></code></pre>
                <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars($component["c5Include"])); ?></textarea>
                <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button>
            </div>
        </div>
        <?php 
            foreach($component["modifiers"] as $modifier) {
                include $root."includes/component/usage.php";
            }
        ?>
    </div>

    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-markup">
        <div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]; ?>-default">
            <div class="ah-snippet">
                <pre><code><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></code></pre>
                <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></textarea>
                <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button>
            </div>
        </div>
        <?php 
            foreach($component["modifiers"] as $modifier) {
                include $root."includes/component/markup.php";
            }
        ?>
    </div>

    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-comments">
        <pre><code><?php echo trim(htmlspecialchars($component["comments"])); ?></code></pre>
    </div>
</div>