// --------------------------------------------------------------------------
// tabs.js
// --------------------------------------------------------------------------
// Tab functionality
// --------------------------------------------------------------------------

AH.tabs = function() {

    'use strict';

    function init() {
        byBehaviour('ah-change-tab').on('click', changeTab)
    }

    function changeTab() {
        var trigger = $(this),
            target = $(trigger.attr('href'));

        target
            .show()
            .siblings()
            .hide();

        trigger
            .addClass('ah-tab-nav__link--active')
            .siblings()
            .removeClass('ah-tab-nav__link--active');

        return false;
    }

    return {
        init: init
    };

}();