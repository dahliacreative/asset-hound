<?php
use \Src\Parsers\Colors;

$c = new Colors($sassPath, $colorsFile);
$colorsList = $c->get();
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
    <?php foreach($colorsList as $color) : ?>
      <li class="ah-color ah-grid__item" style="background-color: <?php echo $color["hex"] ?>;" data-clipboard-text="<?php echo $color["sass"] ?>" data-hex="<?php echo $color["hex"] ?>" data-sass="<?php echo $color["sass"] ?>">
        <div class="ah-color__wrap">
          <h4 class="ah-color__name"><?php echo $color["name"] ?></h4>
          <p class="ah-color__value"><code><?php echo $color["sass"]."<br>".$color["hex"] ?></code></p>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>