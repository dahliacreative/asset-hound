<div class="ah-tabs">
    <div class="ah-tabs__tab" id="<?php echo $item["name"]; ?>-example">
        <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-default">
            <div contenteditable spellcheck="false" class="editor" data-behaviour="edit-markup" data-edit="<?php echo $item["name"]; ?>-default">
                <h1 class="<?php echo $item["name"]; ?>">Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
        <?php 
            foreach($item["modifiers"] as $modifier) {
                include $root."includes/typography/example.php";
            }
        ?>
    </div>

    <div class="ah-component__tab" id="<?php echo $item["name"]; ?>-markup">
        <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-default">
            <pre><code data-editor="<?php echo $item["name"]; ?>-default"><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . '">Lorem ipsum dolor sit amet.</h1>')); ?></code></pre>
        </div>
        <?php 
            foreach($item["modifiers"] as $modifier) {
                include $root."includes/typography/markup.php";
            }
        ?>
    </div>

</div>