<?php 
    foreach($component["data"] as $var=>$value) {
        $$var = $value;
    }
?>

<div class="ah-component" id="ah-<?php echo $component["class"] ?>">
    <div class="ah-component__controls">
        <?php include $root."includes/component/modifier-list.php" ?>
        <?php include $root."includes/component/tab-nav.php" ?>
    </div>
    <?php include $root."includes/component/tabs.php" ?>
</div>