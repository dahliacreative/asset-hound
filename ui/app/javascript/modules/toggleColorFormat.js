// --------------------------------------------------------------------------
// toggleColorFormat.js
// --------------------------------------------------------------------------
// Toggles the color format copied to clipboard.
// --------------------------------------------------------------------------

RN.toggleColorFormat = function() {

  'use strict';

  function init() {
    byBehaviour('toggle-color-format').on('change', toggleColorFormat)
  }

  function toggleColorFormat() {
    var isChecked = $(this).prop('checked');
    byBehaviour('copy-color').each(function() {
      var swatch = $(this),
          format = isChecked ? swatch.data('hex') : swatch.data('sass');

      swatch.attr('data-clipboard-text', format);
    });
  }

  return {
    init: init
  };

}();