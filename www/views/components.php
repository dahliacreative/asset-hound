<?php
use \Src\Parsers\Components;

$c = new Components($componentsPath, $sassPath);
$componentsList = $c->get();
?>

<section class="ah-section" id="ah-components">
    <header class="ah-section__header">
        <h1 class="ah-section__title">Components</h1>
    </header>
    <?php 
        foreach($componentsList as $component) {
            include $root."includes/component/index.php";
        } 
    ?>
</section>