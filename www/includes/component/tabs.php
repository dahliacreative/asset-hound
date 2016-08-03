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

    <div class="ah-tabs__tab" id="<?php echo $component["class"]; ?>-config">
        <form action="config/save-component.php" method="POST" class="ah-form">
            <input type="hidden" name="component" value="<?php echo $component['class'] ?>">
            <h4 class="ah-form__title">Asset Hound Config</h4>
            <div class="ah-form__control">
                <div class="ah-form__select">
                    <select name="columns" data-element="ah-custom-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <label class="ah-form__label">Display columns</label>
            </div>
            <div class="ah-form__control ah-form__control--tall">
                <textarea name="comments" class="ah-form__input ah-form__input--textarea"></textarea>
                <label class="ah-form__label">Comments</label>
            </div>
            <h4 class="ah-form__title">Component Attributes</h4>
            <!-- For each var in component -->
            <div class="ah-form__control">
                <input type="text" class="ah-form__input" value="text(5)" name="titleText">
                <label class="ah-form__label">Title</label>
            </div>
            <h4 class="ah-form__title">Modifier Attributes</h4>
             <fieldset class="ah-form__fieldset">
                <h4 class="ah-form__title">.<?php echo $component["class"] ?></h4>
                <div class="ah-form__control">
                    <label class="ah-form__label">Display Title?</label>
                    <div class="ah-toggle">
                        No
                        <input id="ah-<?php echo $component["class"] ?>-show-title" type="checkbox" class="ah-toggle__input" name="<?php echo $component["class"] ?>-showTitle" <?php if($$component["class"]."showTitle") { echo "checked"; }?> >
                        <label for="ah-<?php echo $component["class"]?>-show-title" class="ah-toggle__label"></label>
                        Yes
                    </div>
                </div>
            </fieldset>
            <?php foreach ($component["modifiers"] as $modifier) : ?>
                <fieldset class="ah-form__fieldset">
                    <h4 class="ah-form__title">.<?php echo $component["class"]."--".$modifier["modifier"] ?></h4>
                    <!-- For each var in component -->
                    <div class="ah-form__control">
                        <label class="ah-form__label">Display Title?</label>
                        <div class="ah-toggle">
                            No
                            <input id="ah-<?php echo $modifier["modifier"] ?>-show-title" type="checkbox" class="ah-toggle__input" name="<?php echo $modifier["modifier"] ?>-showTitle" <?php if($$modifier["modifier"]."showTitle") { echo "checked"; }?> >
                            <label for="ah-<?php echo $modifier["modifier"] ?>-show-title" class="ah-toggle__label"></label>
                            Yes
                        </div>
                    </div>
                </fieldset>
            <?php endforeach; ?>
        </form>
    </div>
</div>