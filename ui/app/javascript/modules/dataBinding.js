// --------------------------------------------------------------------------
// dataBinding.js
// --------------------------------------------------------------------------
// Data Binding functionality for contenteditable
// --------------------------------------------------------------------------

AH.dataBinding = function() {

    'use strict';

    function init() {
        byBehaviour('ah-edit-markup')
            .on('input', updateMarkup)
            .on('focus', selectText);

        byBehaviour('ah-update-tag')
            .on('input', updateTag)
            .on('focus', selectText);
    }

    function escapeHtml(unsafe) {
        return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
    }

    function selectText() {
        var cell = this,
            range, 
            selection;
            
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
    }

    function updateMarkup() {
        console.log('markup')
        var editor = $(this),
            update = editor.html(),
            markup = dataString('ah-editor', editor.data('ah-edit')),
            target = $(markup);

        target.html(escapeHtml(update).trim());
        hljs.highlightBlock(target[0]);
    }

    function updateTag() {
        var input = $(this),
            editor = input.closest('.ah-component').find('.ah-editor'),
            currentTag = input.attr('data-ah-tag'),
            newTag = input.html();

        if(newTag != "") {
            input.attr('data-ah-tag', newTag);
            editor.each(function() {
                var editor = $(this),
                    html = editor.html(),
                    newHtml = html.replace('<' + currentTag, '<' +newTag),
                    newHtml = newHtml.replace(currentTag + '>', newTag + '>');

                editor
                    .html(newHtml.trim())
                    .trigger('input');
            });
        }
    }

    return {
        init: init
    };

}();