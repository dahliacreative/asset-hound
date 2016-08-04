// --------------------------------------------------------------------------
// notifications.js
// --------------------------------------------------------------------------
// Adds a method for adding notifications via JS
// --------------------------------------------------------------------------

AH.notifications = function() {

    'use strict';

    function add(success, message) {
        var classNames = success ? 'ah-notifications__notification ah-notifications__notification--success' : 'ah-notifications__notification ah-notifications__notification--error',
            notification = $('<p/>', { text: message, class: classNames }),
            notifications = byElement('notifications');

        notifications.append(notification);
    }

    return {
        add: add
    };

}();