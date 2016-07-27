<?php
use \Src\Parsers\Typography;

$c = new Typography($typographyFile, $sassPath);
$typographyList = $c->get();
?>
<section class="ah-section" id="ah-typography">
  <div class="ah-section__header">
    <h1 class="ah-section__title">Typography</h1>
  </div>
  <?php foreach($typographyList as $item) : ?>
      <div class="ah-component" id="ah-<?php echo $item["name"]; ?>">
        <div class="ah-component__controls">
          <div class="ah-component__title">
            <div class="ah-component__modifier-list">
              <select>
                <option value="<?php echo $item["name"]; ?>-default"><?php echo $item["class"]; ?></option>
                <?php foreach($item["modifiers"] as $modifier) : ?>
                    <option value="<?php echo $item["name"]; ?>-<?php echo $modifier; ?>"><?php echo $item["class"]; ?>--<?php echo $modifier; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="ah-tabs">
            <a href="<?php echo $item["name"]; ?>-example" class="ah-tabs__link ah-tabs__link--active">
              <img src="images/browser.svg" alt="" class="ah-tabs__icon">Example
            </a>
            <a href="<?php echo $item["name"]; ?>-markup" class="ah-tabs__link">
              <img src="images/code.svg" alt="" class="ah-tabs__icon">Markup
            </a>
          </div>
        </div>
        <div class="ah-component__tabs">
          <div class="ah-component__tab" data-tab="<?php echo $item["name"]; ?>-example">
            <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-default">
              <div contenteditable spellcheck="false">
                <h1 class="<?php echo $item["name"]; ?>">Lorem ipsum dolor sit amet.</h1>
              </div>
            </div>
            <?php foreach($item["modifiers"] as $modifier) : ?>
              <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-<?php echo $modifier; ?>">
                <div contenteditable spellcheck="false">
                  <h1 class="<?php echo $item["name"]; ?> <?php echo $item["name"]; ?>--<?php echo $modifier; ?>" >Lorem ipsum dolor sit amet.</h1>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="ah-component__tab" data-tab="<?php echo $item["name"]; ?>-markup">
            <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-default">
              <pre><code><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . '">Lorem ipsum dolor sit amet.</h1>')); ?></code></pre>
            </div>
            <?php foreach($item["modifiers"] as $modifier) : ?>
                <div class="ah-component__modifier" data-modifier="<?php echo $item["name"]; ?>-<?php echo $modifier; ?>">
                  <pre><code><?php echo trim(htmlspecialchars('<h1 class="' . $item["name"] . ' ' . $item["name"] . '--' . $modifier . '">Lorem ipsum dolor sit amet.</h1>')); ?></code></pre>
                </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  <?php endforeach; ?> 
</section>

