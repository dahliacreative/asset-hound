<?php
use \Src\Parsers\Components;

$c = new Components($componentsPath, $sassPath);
$componentsList = $c->get();
?>

<section class="ah-section" id="ah-components">
  <div class="ah-section__header">
    <h1 class="ah-section__title">Components</h1>
  </div>
  <?php foreach($componentsList as $component) : ?>
    <?php 
        foreach($component["data"] as $var=>$value) {
            $$var = $value;
        }
    ?>
    <div class="ah-component" id="ah-<?php echo $component["class"] ?>">
      <div class="ah-component__controls">
        <div class="ah-component__title">
          .<?php echo $component["class"]; ?>
          <div class="ah-component__modifier-list">
            <select>
              <option value="<?php echo $component["class"]; ?>-default">--default</option>
              <?php foreach($component["modifiers"] as $modifier) : ?>
              <option value="<?php echo $component["class"]; ?>-<?php echo $modifier["modifier"] ?>">--<?php echo $modifier["modifier"] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="ah-tabs">
          <a href="<?php echo $component["class"]; ?>-example" class="ah-tabs__link ah-tabs__link--active">
            <img src="images/browser.svg" alt="" class="ah-tabs__icon">Example
          </a>
          <a href="<?php echo $component["class"]; ?>-usage" class="ah-tabs__link">
            <img src="images/keyboard.svg" alt="" class="ah-tabs__icon">Usage
          </a>
          <a href="<?php echo $component["class"]; ?>-markup" class="ah-tabs__link">
            <img src="images/code.svg" alt="" class="ah-tabs__icon">Markup
          </a>
          <a href="<?php echo $component["class"]; ?>-comments" class="ah-tabs__link">
            <img src="images/message.svg" alt="" class="ah-tabs__icon">Comments
          </a>
        </div>
      </div>
      <div class="ah-component__tabs">
        <div class="ah-component__tab" data-tab="<?php echo $component["class"]; ?>-example">
          <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-default">
            <?php echo $component["evalMarkup"];?>
          </div>
          <?php foreach($component["modifiers"] as $modifier) : ?>
            <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-<?php echo $modifier["modifier"] ?>">
              <?php echo $modifier["evalMarkup"]; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="ah-component__tab" data-tab="<?php echo $component["class"]; ?>-usage">
          <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-default">
            <pre><code><?php echo trim(htmlspecialchars($component["c5Include"])); ?></code></pre>
          </div>
          <?php foreach($component["modifiers"] as $modifier) : ?>
            <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-<?php echo $modifier["modifier"] ?>">
              <pre><code><?php echo trim(htmlspecialchars($modifier["c5Include"])); ?></code></pre>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="ah-component__tab" data-tab="<?php echo $component["class"]; ?>-markup">
          <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-default">
            <pre><code><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></code></pre>
          </div>
          <?php foreach($component["modifiers"] as $modifier) : ?>
            <div class="ah-component__modifier" data-modifier="<?php echo $component["class"]; ?>-<?php echo $modifier["modifier"] ?>">
              <pre><code><?php echo trim(htmlspecialchars($modifier["evalMarkup"])); ?></code></pre>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="ah-component__tab" data-tab="<?php echo $component["class"]; ?>-comments">
          <pre><code><?php echo trim(htmlspecialchars($component["comments"])); ?></code></pre>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>


