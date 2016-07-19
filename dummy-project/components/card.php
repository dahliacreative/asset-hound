<?php

/*
----------------------------------------------------------------------------------------------------
ASSET HOUND CONFIG - Card
----------------------------------------------------------------------------------------------------
modifiers: ["small", "large"]
data: {
    "title": "Card Title",
    "copy": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, pariatur!",
    "href": "http://google.com",
    "linkText": "Read more"
}
----------------------------------------------------------------------------------------------------
*/

$modifier_classes = (is_array($modifiers) && count($modifiers) >=1 ? ' card--' . implode(' card--', $modifiers) : "");
?>
<!-- component -->
<div class="card <?php echo $modifier_classes; ?>">
  <h1 class="card__title"><?php echo $title ?></h1>
  <p class="card__copy"><?php echo $copy ?></p>
  <a href="<?php echo $href ?>"><?php echo $linkText; ?></a>
</div>
<!-- /component -->