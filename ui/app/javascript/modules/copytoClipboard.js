// --------------------------------------------------------------------------
// copyToClipboard.js
// --------------------------------------------------------------------------
// Handles copy to clipboard events.
// --------------------------------------------------------------------------

AH.copyToClipboard = function() {

    'use strict';

    function init() {
        var copyColor = dataString('behaviour', 'ah-copy-color'),
            colors = new Clipboard(copyColor);
        colors.on('success', handleColor);
    }

    function handleColor(e) {
        var swatch = $(e.trigger);
        swatch.addClass('ah-color--copied');
        setTimeout(function() {
        swatch.removeClass('ah-color--copied');
        }, 2000);
    }

    return {
        init: init
    };

}();