// --------------------------------------------------------------------------
// scrollTo.js
// --------------------------------------------------------------------------
// Smooth scroll to an anchor point
// --------------------------------------------------------------------------

AH.scrollTo = function() {

    'use strict';

    function init() {
        byBehaviour('ah-scroll-to').on('click', scrollTo)
    }

    function scrollTo() {
        var trigger = $(this),
            target = $(trigger.attr('href')),
            offset = target.offset().top - 190;
            
        $('html, body').animate({ scrollTop: offset });
        $('.ah-navigation__link--active').removeClass('ah-navigation__link--active');
        trigger.addClass('ah-navigation__link--active');
        
        return false;
    }

    return {
        init: init
    };

}();