<?php
use \Src\Parsers\Components;

$c = new Components($componentsPath);
$componentsList = $c->get();
?>

<section class="ah-section" id="ah-components">
  <h1 class="ah-section__title">Components</h1>
  <?php foreach($componentsList as $component) : ?>
    <?php 
        foreach($component["data"] as $var=>$value) {
            $$var = $value;
        }
    ?>

    <div class="ah-component" id="ah-<?php echo $component["class"]; ?>">
      <h2 class="ah-component__title"><?php echo $component["title"]; ?></h2>
      <div class="ah-component__example">
        <?php
            echo $component["evalMarkup"];
        ?>
      </div>
      <div class="ah-component__usage">
        <pre><?php echo trim(htmlspecialchars($component["evalMarkup"])); ?></pre>
      </div>
      <h3 class="ah-component__sub-title">Modifiers</h3>
      <?php foreach($component["modifiers"] as $modifier) : ?>
          <h4 class="ah-component__mod-title"><?php echo $modifier["modifier"] ?></h4>
          <div class="ah-component__example">
            <?php echo $modifier["evalMarkup"]; ?>
          </div>
          <div class="ah-component__usage">
            <pre><?php echo trim(htmlspecialchars($modifier["evalMarkup"])); ?></pre>
          </div>          
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</section>