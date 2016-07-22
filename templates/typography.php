<?php
use \Src\Parsers\Typography;

$c = new Typography();
$typographyList = $c->get();
?>
<section class="ah-section" id="ah-typography">
  <div class="ah-section__header">
    <h1 class="ah-section__title">Typography</h1>
  </div>
  <div class="ah-component" id="ah-{{heading}}">
    <div class="ah-component__controls">
      <div class="ah-component__title">
        .{{heading}}
        <div class="ah-component__modifier-list">
          <select>
            <option value="{{heading}}-default">--default</option>
            <option value="{{heading}}-{{modifier}}">--{{modifier}}</option>
          </select>
        </div>
      </div>
      <div class="ah-tabs">
        <a href="{{heading}}-example" class="ah-tabs__link ah-tabs__link--active">
          <img src="images/browser.svg" alt="" class="ah-tabs__icon">Example
        </a>
        <a href="{{heading}}-markup" class="ah-tabs__link">
          <img src="images/code.svg" alt="" class="ah-tabs__icon">Markup
        </a>
      </div>
    </div>
    <div class="ah-component__tabs">
      <div class="ah-component__tab" data-tab="{{heading}}-example">
        <div class="ah-component__modifier" data-modifier="{{heading}}-default">
          <h1 class="heading">Heading</h1>
        </div>
          <div class="ah-component__modifier" data-modifier="{{heading}}-{{modifier}}">
            <h1 class="heading heading--modifier">Heading</h1>
          </div>
      </div>
      <div class="ah-component__tab" data-tab="{{heading}}-markup">
        <div class="ah-component__modifier" data-modifier="{{heading}}-default">
          <pre><code><?php echo trim(htmlspecialchars('<h1 class="heading">Heading</h1>')); ?></code></pre>
        </div>
        <div class="ah-component__modifier" data-modifier="{{heading}}-{{modifier}}">
          <pre><code><?php echo trim(htmlspecialchars('<h1 class="heading heading--modifier">Heading</h1>')); ?></code></pre>
        </div>
      </div>
    </div>
  </div>
</section>

