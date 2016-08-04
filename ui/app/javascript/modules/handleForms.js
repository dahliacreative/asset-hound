// --------------------------------------------------------------------------
// handleForms.js
// --------------------------------------------------------------------------
// Handles submitting forms via ajax
// --------------------------------------------------------------------------

AH.handleForms = function() {

    'use strict';

    function init() {
        byBehaviour('save-component').on('submit', saveComponent);
        byBehaviour('save-settings').on('submit', saveSettings);
    }

    function saveComponent() {
        var form = $(this),
            formData = form.serializeObject(),
            componentName = Object.keys(formData)[0],
            successMsg = 'Settings for ' + componentName + ' saved succesfully!',
            url = form.data('action'),
            data = {
                componentName: componentName,
                config: JSON.stringify(formData[componentName])
            };

        submitForm(url, data, successMsg);
        return false;
    }

    function saveSettings() {
        var form = $(this),
            formData = form.serialize(),
            url = form.data('action'),
            successMsg = 'Settings saved succesfully!';
        submitForm(url, formData, successMsg);
        return false;
    }

    function submitForm(url, data, successMsg) {
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(response) {
                if(response.status === "200") {
                    AH.notifications.add(true, successMsg);
                }
            }
        });
    }

    return {
        init: init
    };

}();