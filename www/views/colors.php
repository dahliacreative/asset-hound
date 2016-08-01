<?php
use \Src\Parsers\Colors;

$c = new Colors($sassPath, $colorsFile);
$colorsList = $c->get();
?>

<section class="ah-section" id="ah-colors">
  
    <header class="ah-section__header">
        <h1 class="ah-section__title">Color Pallette</h1>
        <div class="ah-toggle">
            SASS Var
            <input id="ah-format" type="checkbox" class="ah-toggle__input" data-behaviour="toggle-color-format"/>
            <label for="ah-format" class="ah-toggle__label"></label>
            CSS Hex
        </div>
    </header>

    <ul class="ah-grid">
        <?php 
            foreach ($colorsList as $color) {
                include $root.'includes/color/index.php';
            } 
        ?>
    </ul>

</section>