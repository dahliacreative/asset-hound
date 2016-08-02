<?php
$fileSystemIterator = new FileSystemIterator($componentsPath);
$components = array();
foreach($fileSystemIterator as $file) {
    $components[] = $file->getFilename();
}
?>

<nav class="ah-navigation">
    <?php if(!$settingsPage) : ?>
    <ul class="ah-navigation__list">
        <li class="ah-navigation__item">
            <a href="#ah-colors" class="ah-navigation__link ah-navigation__link--active" data-behaviour="ah-scroll-to">Color Pallette</a>
        </li>
        <li class="ah-navigation__item">
            <a href="#ah-typography" class="ah-navigation__link" data-behaviour="ah-scroll-to">Typography</a>
        </li>
        <li class="ah-navigation__item">
            <a href="#ah-components" class="ah-navigation__link" data-behaviour="ah-scroll-to">Components</a>
            <ul class="ah-navigation__list ah-navigation__list--sub">
                <?php foreach($components as $component) : ?>
                    <?php 
                        $componentName = str_replace(".php", "", $component);
                        $componentTitle = str_replace("_", " ", str_replace("-", " ", $componentName));
                    ?>
                    <li class="ah-navigation__item">
                        <a href="#ah-<?php echo $componentName ?>" class="ah-navigation__link" data-behaviour="ah-scroll-to"><?php echo $componentTitle ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
    <a href="settings.php" class="ah-navigation__link ah-navigation__link--settings">Settings</a>
    <?php else : ?>
        <ul class="ah-navigation__list">
            <li class="ah-navigation__item">
                <a href="index.php" class="ah-navigation__link">Styleguide</a>
            </li>
        </ul>
    <?php endif;?>
    
</nav>