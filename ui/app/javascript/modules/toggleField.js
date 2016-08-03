// --------------------------------------------------------------------------
// toggleField.js
// --------------------------------------------------------------------------
// Toggles a field based on a checkbox
// --------------------------------------------------------------------------

AH.toggleField = function() {

    'use strict';

    function init() {
        byBehaviour('toggle-field').on('change', toggleField);
        byBehaviour('toggle-field').each(toggleField);
    }

    function toggleField() {
        var trigger = $(this),
            field = $(trigger.data('field')),
            checked = trigger.prop('checked');

        if(checked) {
            field.fadeIn();
        } else {
            field.fadeOut();
        }
    }

    return {
        init: init
    };

}();