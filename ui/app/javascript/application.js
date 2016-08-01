// --------------------------------------------------------------------------
// application.js
// --------------------------------------------------------------------------
// This file imports and initialises modules.
//
// Add module names to the modules array for automatic initialisation.
//
// No specific javascript should be placed in this file.
// --------------------------------------------------------------------------

$(function() {

    'use strict';

    var modules = [
        'copyToClipboard',
        'toggleColorFormat',
        'toggleNavigation',
        'modifierList',
        'dataBinding',
        'scrollTo',
        'tabs'
    ];

    for(var i = 0; i < modules.length; i++) {
        AH[modules[i]].init();
    }

    byElement('ah-custom-select').selectron();

    hljs.initHighlightingOnLoad();

});