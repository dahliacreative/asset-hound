<div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $item["name"]."-".$modifier; ?>">
    <div class="ah-snippet">
        <pre><code data-ah-editor="ah-<?php echo $item["name"]."-".$modifier; ?>"><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . ' ' . $item["name"] . '--' . $modifier . '">Lorem ipsum dolor sit amet.</h1>')); ?></code></pre>
        <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . ' ' . $item["name"] . '--' . $modifier . '">Lorem ipsum dolor sit amet.</h1>')); ?></textarea>
        <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button>
    </div>
</div>