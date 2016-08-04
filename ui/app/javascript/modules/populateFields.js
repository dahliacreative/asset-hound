// --------------------------------------------------------------------------
// populateFields.js
// --------------------------------------------------------------------------
// Populates other title fields in component config form
// --------------------------------------------------------------------------

AH.populateFields = function() {

    'use strict';

    function init() {
        byBehaviour('populate-fields').on('keyup', populateFields);
        byBehaviour('populate-fields').each(populateFields);
    }

    function populateFields() {
        var trigger = $(this),
            fields = trigger.data('fields'),
            value = trigger.val();

        $(dataString('field', fields)).val(value);
    }

    return {
        init: init
    };

}();