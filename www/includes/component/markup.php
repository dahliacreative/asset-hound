<div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]."-".$modifier["modifier"]; ?>">
    <div class="ah-snippet">
        <pre><code><?php echo trim(htmlspecialchars($modifier["evalMarkup"])); ?></code></pre>
        <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars($modifier["evalMarkup"])); ?></textarea>
        <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button></pre>
    </div>
</div>