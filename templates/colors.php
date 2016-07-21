<?php
use \Src\Parsers\Colors;

$c = new Colors($sassPath, $colorsFile);
$colors = $c->get();
?>

<section class="ah-section" id="ah-colors">
  <div class="ah-section__header">
    <h1 class="ah-section__title">Color Pallette</h1>
    <div class="ah-toggle">
      SASS Var
      <input id="ah-format" type="checkbox" class="ah-toggle__input"/>
      <label for="ah-format" class="ah-toggle__label"></label>
      CSS Hex
    </div>
  </div>
  <ul class="ah-grid">
    <?php foreach($colors as $color) : ?>
      <li class="ah-grid__item">
        <div class="ah-color" data-hex="<?php echo $color["hex"] ?>" data-sass="<?php echo $color["sass"] ?>">
          <div data-text="copy" data-clipboard-text="<?php echo $color["sass"] ?>" class="ah-color__block" style="background-color: <?php echo $color["hex"] ?>;"></div>
          <div class="ah-color__wrap">
            <h4 class="ah-color__name"><?php echo $color["name"] ?></h4>
            <p class="ah-color__value"><code><?php echo $color["sass"]."<br>".$color["hex"] ?></code></p>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>