$(function() {

  $('.ah-toggle__input').on('change', function() {
    var checked = $(this).prop('checked');
    if(checked) {
      $('.ah-color__block').each(function() {
        var color = $(this),
            value = color.closest('.ah-color').data('hex');
        color.attr('data-clipboard-text', value);
      });
    } else {
      $('.ah-color__block').each(function() {
        var color = $(this),
            value = color.closest('.ah-color').data('sass');
        color.attr('data-clipboard-text', value);
      });
    }
  });

  var clip = new Clipboard('.ah-color__block');
  clip.on('success', function(e) {
    var trigger = $(e.trigger);
    trigger.addClass('ah-color__block--copied');
    trigger.attr('data-text', 'Copied');
    setTimeout(function() {
      trigger.removeClass('ah-color__block--copied');
      setTimeout(function() {
        trigger.attr('data-text', 'Copy');
      }, 300);
    }, 3000);
  });

  $('.ah-navigation__link').on('click', function() {
    var trigger = $(this),
        target = $(trigger.attr('href')),
        offset = target.offset().top - 90;

    $('html, body').animate({ scrollTop: offset });
    
    return false;
  });

});