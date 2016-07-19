<?php
  $fileSystemIterator = new FileSystemIterator($componentsPath);
  $components = array();
  foreach($fileSystemIterator as $file) {
    $components[] = $file->getFilename();
  }
?>



<section class="ah-section" id="ah-components">
  <h1 class="ah-section__title">Components</h1>
  <?php foreach($components as $component) : ?>
    <div class="ah-component" id="ah-<?php echo str_replace(".php", "", $component) ?>">
      <h2 class="ah-component__title"><?php echo str_replace("_", " ", str_replace("-", " ", str_replace(".php", "", $component))) ?></h2>
      <?php 
        $file = file_get_contents("components/".$component);
        // Do some stuff here to replace vars with dummy content
        // Also do some stuff here to grab the modifiers comment at the top of the component and print out component with said modifiers
        echo $file;
      ?>
      <div class="ah-component__example">
        <!-- Component Gets Rendered here -->
      </div>
      <div class="ah-component__usage">
        <!-- Component Usage code gets rendered here -->
      </div>
      <h3 class="ah-component__sub-title">Modifiers</h3>
      <div class="ah-component__usage">
        <!-- Component Modifier Usage gets rendered here -->
      </div>
      <!-- for each modifier -->
      <div class="ah-component__example">
        <!-- Component Gets Rendered here -->
      </div>
    </div>
  <?php endforeach; ?>
</section>