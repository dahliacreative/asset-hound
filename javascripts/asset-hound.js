$(function() {

  $('.ah-toggle__input').on('change', function() {
    var checked = $(this).prop('checked');
    if(checked) {
      $('.ah-color').each(function() {
        var color = $(this),
            value = color.data('hex');
        color.attr('data-clipboard-text', value);
      });
    } else {
      $('.ah-color').each(function() {
        var color = $(this),
            value = color.data('sass');
        color.attr('data-clipboard-text', value);
      });
    }
  });

  var clip = new Clipboard('.ah-color');
  clip.on('success', function(e) {
    var trigger = $(e.trigger);
    trigger.addClass('ah-color--copied');
    setTimeout(function() {
      trigger.removeClass('ah-color--copied');
    }, 2000);
  });

  $('.ah-navigation__link').on('click', function() {
    var trigger = $(this),
        target = $(trigger.attr('href')),
        offset = target.offset().top - 190;

    $('.ah-navigation__link--active').removeClass('ah-navigation__link--active');
    trigger.addClass('ah-navigation__link--active');

    $('html, body').animate({ scrollTop: offset });
    
    return false;
  });

  hljs.initHighlightingOnLoad();

  $('.ah-component__modifier-list select').on('change', function() {
    var modifier = this.value;
    $('[data-modifier="' + modifier + '"]').show().siblings().hide();
  });

  $('.ah-tabs__link').on('click', function() {
    var trigger = $(this),
        target = trigger.attr('href');
    $('[data-tab="' + target + '"]').show().siblings().hide();
    trigger.addClass('ah-tabs__link--active').siblings().removeClass('ah-tabs__link--active');
    return false
  });

  $('.ah-component__mod-title').on('click', function() {
    var target = $(this).next(),
        visible = target.is(":visible");
    
    target.slideToggle(!visible);

    return false;
  });

  $('.ah-menu').on('click', function() {
    $('body').toggleClass('nav-open');
  });

});