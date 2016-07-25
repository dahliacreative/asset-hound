<?php

/*
----------------------------------------------------------------------------------------------------
ASSET HOUND CONFIG - Card
----------------------------------------------------------------------------------------------------
data: {
    "title": "Card Title",
    "subtitle": "Sub title",
    "content": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, pariatur!",
    "href": "http://google.com",
    "linkText": "Read more",
    "image_src": "http://placehold.it/200",
    "image_alt": "Image Alt",
    "date": "10/02/2016"
}
----------------------------------------------------------------------------------------------------
*/

$modifier_classes = (is_array($modifiers) && count($modifiers) >=1 ? " card--" . implode(" card--", $modifiers) : "");
?>
<!-- component -->
<?php $modifier_classes = (is_array($modifiers) && count($modifiers) >=1 ? ' card--' . implode(' card--', $modifiers) : ""); ?>
<article class="card <?php echo $modifier_classes; ?>">
    <?php if($href) : ?>
    <a href="<?php echo $href; ?>">
    <?php endif; ?>
    <?php if($modifiers && in_array('document', $modifiers) && !in_array('no-image', $modifiers)): ?>
    <div class="card__media-wrap">
    <?php if($image_src): ?>
        <img src="<?php echo $image_src ?>" alt="<?php echo $image_alt; ?>" class="card__media"/>
    <?php else: ?>
         <img src="<?php echo $view->getThemePath()?>/app/images/content/brochure.jpg" alt="<?php echo $image_alt; ?>" class="card__media"/>
    <?php endif; ?>
    </div>
    <?php elseif($image_src): ?>
    <div class="card__media-wrap">
        <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" class="card__media"/>
    </div>
    <?php endif; ?>
    <div class="card__content">
        <h1 class="card__title"><?php echo $title; ?></h1>
        <?php if($subtitle) : ?>
        <p class="card__subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <p class="card__copy"><?php echo $content; ?></p>
        <?php if($date) : ?>
        <time class="date"><?php echo $date; ?></time>
        <?php endif; ?>
        <?php if($component) : ?>
        <?php $this->inc('components/'.$component.'.php', $component_data); ?>
        <?php endif; ?>
    </div>
    <?php if($href) : ?>
    </a>
    <?php endif; ?>
</article>
<!-- /component -->