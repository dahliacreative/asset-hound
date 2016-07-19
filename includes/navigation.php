<?php
  $fileSystemIterator = new FileSystemIterator($componentsPath);
  $components = array();
  foreach($fileSystemIterator as $file) {
    $components[] = $file->getFilename();
  }
?>

<nav class="ah-navigation">
  <ul class="ah-navigation__list">
    <li class="ah-navigation__item">
      <a href="#ah-colors" class="ah-navigation__link">Color Pallette</a>
    </li>
    <li class="ah-navigation__item">
      <a href="#ah-typography" class="ah-navigation__link">Typography</a>
    </li>
    <li class="ah-navigation__item">
      <a href="#ah-components" class="ah-navigation__link">Components</a>
      <ul class="ah-navigation__sub-list">
        <?php foreach($components as $component) : ?>
          <?php 
            $componentName = str_replace(".php", "", $component);
            $componentTitle = str_replace("_", " ", str_replace("-", " ", $componentName));
          ?>
          <li class="ah-navigation__item">
            <a href="#ah-<?php echo $componentName ?>" class="ah-navigation__link"><?php echo $componentTitle ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
</nav>