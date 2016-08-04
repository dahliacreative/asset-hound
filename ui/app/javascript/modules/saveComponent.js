// --------------------------------------------------------------------------
// saveComponent.js
// --------------------------------------------------------------------------
// Searializes component config form to json and sends to backend
// --------------------------------------------------------------------------

AH.saveComponent = function() {

    'use strict';

    function init() {
        byBehaviour('save-component').on('submit', saveComponent);
    }

    function saveComponent() {
        var form = $(this),
            formData = form.serializeObject(),
            componentName = Object.keys(formData)[0];

        $.ajax({
            url: 'config/save-component.php',
            method: 'POST',
            data: {
                componentName: componentName,
                config: JSON.stringify(formData[componentName])
            },
            success: function(response) {
                if(response.status === "200") {
                    alert(componentName + ' config saved!');
                }
            }
        });
        return false;
    }

    return {
        init: init
    };

}();