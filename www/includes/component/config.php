<div class="ah-columns">
    <div class="ah-columns__side">
        <div class="ah-config-nav">
            <a href="#<?php echo $component['class'] ?>-ah-config" class="ah-config-nav__item ah-tab-nav__link--active" data-behaviour="ah-change-tab">Asset Hound Config</a>
            <a href="#<?php echo $component['class'] ?>-default-attr" class="ah-config-nav__item" data-behaviour="ah-change-tab">.<?php echo $component["class"] ?> attributes</a>
            <?php foreach ($component["modifiers"] as $modifier) : ?>
            <a href="#<?php echo $component['class'] ?>-<?php echo $modifier["modifier"] ?>-attr" class="ah-config-nav__item" data-behaviour="ah-change-tab">.<?php echo $component["class"]."--".$modifier["modifier"] ?> attributes</a>
            <?php endforeach ?>
        </div>
    </div>
    <form class="ah-form ah-columns__main" data-behaviour="save-component" data-action="config/save-component.php">
        <div>
            <div id="<?php echo $component['class'] ?>-ah-config" class="ah-tabs__tab">
                <h4 class="ah-form__title">Asset Hound Config</h4>
                <div class="ah-form__control">
                    <div class="ah-form__well">
                        <select name="<?php echo $component['class'] ?>[columns]" data-element="ah-custom-select">
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
                    <textarea name="<?php echo $component['class'] ?>[comments]" class="ah-form__input ah-form__input--textarea"></textarea>
                    <label class="ah-form__label">Comments</label>
                </div>
            </div>

            <div id="<?php echo $component['class'] ?>-default-attr" class="ah-tabs__tab">
                <h4 class="ah-form__title">.<?php echo $component["class"] ?> attributes</h4>
                <?php foreach($component['vars'] as $key=>$var) : ?>
                            <div class="ah-form__control">
                                <textarea
                                    class="ah-form__input ah-form__input--nested"
                                    type="text"
                                    id="<?php echo $component["class"] ?>-<?php echo $key; ?>"
                                    data-field="<?php echo $component["class"] ?>-<?php echo $key; ?>"
                                    name="<?php echo $component['class'] ?>[data][default][<?php echo $key; ?>]"></textarea>
                                <label class="ah-form__label"><?php echo $key; ?></label>
                                <div class="ah-toggle">
                                    Show
                                    <input
                                        id="ah-<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>"
                                        type="checkbox" class="ah-toggle__input"
                                        data-behaviour="toggle-field"
                                        data-reverse-toggle="true"
                                        data-field="#<?php echo $component["class"] ?>-<?php echo $key; ?>"
                                        name="<?php echo $component['class'] ?>[data][default][<?php echo $key; ?>]"
                                        value="false">
                                    <label for="ah-<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>" class="ah-toggle__label"></label>
                                    Hide
                                </div>
                            </div>
                <?php endforeach; ?>
            </div>

            <?php foreach ($component["modifiers"] as $modifier) : ?>
                <div id="<?php echo $component['class'] ?>-<?php echo $modifier["modifier"] ?>-attr" class="ah-tabs__tab">
                    <h4 class="ah-form__title">.<?php echo $component["class"]."--".$modifier["modifier"] ?> attributes</h4>
                    <?php foreach($component['vars'] as $key=>$var) : ?>
                                <div class="ah-form__control">
                                    <textarea
                                        type="text"
                                        class="ah-form__input ah-form__input--nested"
                                        id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-<?php echo $key; ?>"
                                        data-field="<?php echo $component["class"] ?>-<?php echo $key; ?>"
                                        name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][<?php echo $key; ?>]"></textarea>
                                    <label class="ah-form__label"><?php echo $key; ?></label>
                                    <div class="ah-toggle">
                                        Show
                                        <input
                                            id="<?php echo $modifier["modifier"] ?>-show-<?php echo $key; ?>"
                                            type="checkbox" class="ah-toggle__input"
                                            data-behaviour="toggle-field"
                                            data-reverse-toggle="true"
                                            data-field="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-<?php echo $key; ?>"
                                            value="false"
                                            name="<?php echo $component['class'] ?>[data][modifiers][<?php echo $modifier['modifier'] ?>][<?php echo $key; ?>]">
                                        <label for="<?php echo $modifier["modifier"] ?>-show-<?php echo $key ?>" class="ah-toggle__label"></label>
                                        Hide
                                    </div>
                                </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="ah-form__control ah-form__control--save">
            <button type="submit" class="ah-button">Save Config</button>
        </div>
    </form>

</div>
