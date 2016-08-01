$(function() {

  function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
  }

  // $('.ah-toggle__input').on('change', function() {
  //   var checked = $(this).prop('checked');
  //   if(checked) {
  //     $('.ah-color').each(function() {
  //       var color = $(this),
  //           value = color.data('hex');
  //       color.attr('data-clipboard-text', value);
  //     });
  //   } else {
  //     $('.ah-color').each(function() {
  //       var color = $(this),
  //           value = color.data('sass');
  //       color.attr('data-clipboard-text', value);
  //     });
  //   }
  // });

  // var clip = new Clipboard('.ah-color');
  // clip.on('success', function(e) {
  //   var trigger = $(e.trigger);
  //   trigger.addClass('ah-color--copied');
  //   setTimeout(function() {
  //     trigger.removeClass('ah-color--copied');
  //   }, 2000);
  // });

  $('.ah-navigation__link').on('click', function() {
    var trigger = $(this),
        target = $(trigger.attr('href')),
        offset = target.offset().top - 190;

    $('.ah-navigation__link--active').removeClass('ah-navigation__link--active');
    trigger.addClass('ah-navigation__link--active');

    $('html, body').animate({ scrollTop: offset });
    
    return false;
  });

  // hljs.initHighlightingOnLoad();

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

  $('.editor').on('input', function() {
    var code = $(this).data('edit'),
        update = $(this).html();
        target = $('[data-edit-update="' + code + '"]');

    target.html(escapeHtml(update).trim());
    hljs.highlightBlock(target[0]);
  });

  $('.ah-component__tag [contenteditable]').on('focus', function() {
    var cell = this;
    var range, selection;
    if (document.body.createTextRange) {
      range = document.body.createTextRange();
      range.moveToElementText(cell);
      range.select();
    } else if (window.getSelection) {
      selection = window.getSelection();
      range = document.createRange();
      range.selectNodeContents(cell);
      selection.removeAllRanges();
      selection.addRange(range);
    }
  });


  $('.ah-component__tag [contenteditable]').on('input', function() {
    var input = $(this),
        editor = input.closest('.ah-component').find('.editor'),
        currentTag =  input.attr('data-tag'),
        newTag = input.html();

    if(newTag !== "") {
      input.attr('data-tag', newTag);
      editor.each(function() {
        var editor = $(this),
            html = editor.html(),
            newHtml = html.replace('<' + currentTag, '<' +newTag),
            newHtml = newHtml.replace(currentTag + '>', newTag + '>');

        input.attr('data-tag', newTag).val(newTag);
        editor.html(newHtml.trim()).trigger('input');
      });
    }
  });

});