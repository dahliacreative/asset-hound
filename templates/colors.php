<?php
  $file = fopen($sassPath.$colorsFile,"r") or die($sassPath.$colorsFile." does not exist.");
  $colors = array();
  while(! feof($file)) {
    $line = fgets($file);
    if($line) {
      $vars = array_map('trim', explode(":", $line));
      array_push($colors, $vars);
    }
  }
  fclose($file);
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
        <div class="ah-color" data-hex="<?php echo $color[1] ?>" data-sass="<?php echo $color[0] ?>">
          <div data-text="copy" data-clipboard-text="<?php echo $color[0] ?>" class="ah-color__block" style="background-color: <?php echo $color[1] ?>;"></div>
          <div class="ah-color__wrap">
            <h4 class="ah-color__name"><?php echo str_replace("-", " ", str_replace("$", "", $color[0])) ?></h4>
            <p class="ah-color__value"><code><?php echo $color[0]."<br>".$color[1] ?></code></p>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>