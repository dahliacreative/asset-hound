// --------------------------------------------------------------------------
// copyToClipboard.js
// --------------------------------------------------------------------------
// Handles copy to clipboard events.
// --------------------------------------------------------------------------

AH.copyToClipboard = function() {

    'use strict';

    function init() {
        var copyColor = dataString('behaviour', 'ah-copy-color'),
            colors = new Clipboard(copyColor),
            copyCode = dataString('behaviour', 'ah-copy-code');

        colors.on('success', handleColor);
        
        var code = new Clipboard(copyCode, {
            text: function(trigger) {
                var content = $(trigger).siblings('textarea').val();
                return content;
            }
        });
        code.on('success', handleCode);
    }

    function handleColor(e) {
        var swatch = $(e.trigger);
        swatch.addClass('ah-color--copied');
        setTimeout(function() {
            swatch.removeClass('ah-color--copied');
        }, 2000);
    }

    function handleCode(e) {
        console.log('sh')
        var trigger = $(e.trigger),
            snippet = trigger.parent();

        snippet.addClass('ah-snippet--copied');
        setTimeout(function() {
            snippet.removeClass('ah-snippet--copied');
        }, 2000);
    }

    return {
        init: init
    };

}();