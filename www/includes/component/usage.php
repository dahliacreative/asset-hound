<div class="ah-component__modifier" data-ah-modifier="ah-<?php echo $component["class"]."-".$modifier["modifier"]; ?>">
    <div class="ah-snippet">
        <pre><code><?php echo trim(htmlspecialchars($component["c5Include"])); ?></code></pre>
        <textarea class="ah-snippet__code"><?php echo trim(htmlspecialchars($component["c5Include"])); ?></textarea>
        <button type="button" class="ah-button" data-behaviour="ah-copy-code">Copy</button>
    </div>
</div>