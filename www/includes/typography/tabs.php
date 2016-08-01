<div class="ah-tabs">
    <div class="ah-tabs__tab" id="<?php echo $item["name"]; ?>-example">
        <div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $item["name"]; ?>-default">
            <div contenteditable spellcheck="false" class="ah-editor" data-behaviour="ah-edit-markup" data-ah-edit="ah-<?php echo $item["name"]; ?>-default">
                <h1 class="<?php echo $item["name"]; ?>">Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
        <?php 
            foreach($item["modifiers"] as $modifier) {
                include $root."includes/typography/example.php";
            }
        ?>
    </div>

    <div class="ah-tabs__tab" id="<?php echo $item["name"]; ?>-markup">
        <div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $item["name"]; ?>-default">
            <div class="ah-snippet">
                <pre><code data-ah-editor="ah-<?php echo $item["name"]; ?>-default"><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . '">Lorem ipsum dolor sit amet.</h1>')); ?></code></pre>
                <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . '">Lorem ipsum dolor sit amet.</h1>')); ?></textarea>
                <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button>
            </div>
        </div>
        <?php 
            foreach($item["modifiers"] as $modifier) {
                include $root."includes/typography/markup.php";
            }
        ?>
    </div>

</div>