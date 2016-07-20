<?php
use \Src\Parsers\Components;

$c = new Components($componentsPath);
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

    <div class="ah-component" id="ah-<?php echo $component["class"]; ?>">
      <h2 class="ah-component__title"><?php echo $component["title"]; ?></h2>
      
      <div class="ah-tab-links">
        <a href="#<?php echo $component["class"] ?>-example"" class="ah-tab-links__link ah-tab-links__link--active">Example</a>
        <a href="#<?php echo $component["class"] ?>-usage"" class="ah-tab-links__link">Usage</a>
      </div>
      <div class="ah-tabs">
        <div class="ah-component__example" id="<?php echo $component["class"] ?>-example">
          <?php echo $component["evalMarkup"];?>
        </div>
        <div class="ah-component__usage" id="<?php echo $component["class"] ?>-usage">
          <pre><code><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></code></pre>
        </div>
      </div>

      <h3 class="ah-component__sub-title">Modifiers</h3>

      <?php foreach($component["modifiers"] as $modifier) : ?>
        <h4 class="ah-component__mod-title"><?php echo ".".$component["class"]."--".$modifier["modifier"] ?></h4>
        <div class="ah-modifier">
          <div class="ah-modifier__wrap">
            <div class="ah-tab-links">
              <a href="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-example"" class="ah-tab-links__link ah-tab-links__link--active">Example</a>
              <a href="#<?php echo $component["class"]."-".$modifier["modifier"] ?>-usage"" class="ah-tab-links__link">Usage</a>
            </div>
            <div class="ah-tabs">
              <div class="ah-component__example" id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-example">
                <?php echo $modifier["evalMarkup"]; ?>
              </div>
              <div class="ah-component__usage" id="<?php echo $component["class"]."-".$modifier["modifier"] ?>-usage">
                <pre><code><?php echo trim(htmlspecialchars($modifier["evalMarkup"])); ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  <?php endforeach; ?>
</section>