// --------------------------------------------------------------------------
// toggleNavigation.js
// --------------------------------------------------------------------------
// Nav toggle
// --------------------------------------------------------------------------

AH.toggleNavigation = function() {

    'use strict';

    function init() {
        byBehaviour('ah-toggle-navigation').on('click', toggleNavigation)
    }

    function toggleNavigation() {
        $('html').toggleClass('nav-open');
        return false;
    }

    return {
        init: init
    };

}();