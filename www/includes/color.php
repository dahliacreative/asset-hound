<li class="ah-color ah-grid__item"
    style="background-color: <?php echo $color["hex"]?>"
    data-clipboard-text="<?php echo $color["sass"]?>"
    data-hex="<?php echo $color["hex"]?>"
    data-sass="<?php echo $color["sass"]?>"
    data-behaviour="copy-color">
    
  <div class="ah-color__wrap">
    <h4 class="ah-color__name"><?php echo $color["name"]?></h4>
    <p class="ah-color__value">
        <code>
            <?php echo $color["sass"]?> <br/>
            <?php echo $color["hex"]?>    
        </code>
    </p>
  </div>
</li>