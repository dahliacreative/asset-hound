<?php
use \Src\Parsers\Typography;

$c = new Typography($typographyFile, $sassPath);
$typographyList = $c->get();
?>

<section class="ah-section" id="ah-typography">
    <div class="ah-section__header">
        <h1 class="ah-section__title">Typography</h1>
    </div>
    <?php 
        foreach($typographyList as $item) {
            include $root."includes/typography/index.php";
        } 
    ?>
</section>