// --------------------------------------------------------------------------
// modifierList.js
// --------------------------------------------------------------------------
// Changes the component modifier
// --------------------------------------------------------------------------

AH.modifierList = function() {

    'use strict';

    function init() {
        byBehaviour('ah-modifier-list').on('change', changeModifier)
    }

    function changeModifier() {
        var modifier = this.value,
            element = dataString('ah-modifier', modifier);

        $(element)
            .show()
            .siblings()
            .hide();
    }

    return {
        init: init
    };

}();