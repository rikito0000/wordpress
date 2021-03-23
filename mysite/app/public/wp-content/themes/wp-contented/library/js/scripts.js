function updateViewportDimensions() {
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
    return {
        width: x,
        height: y
    }
}
// setting the viewport width
var viewport = updateViewportDimensions();


var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

function loadGravatars() {
    // set the viewport using the function above
    viewport = updateViewportDimensions();
    // if the viewport is tablet or larger, we load in the gravatars
    if (viewport.width >= 768) {
        jQuery('.comment img[data-gravatar]').each(function() {
            jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
        });
    }
} // end function


var callback = function() {
    jQuery(".full-top-area").height(jQuery(window).height() - 0)
};
jQuery(document).ready(callback);
jQuery(window).resize(callback);

jQuery(document).ready(function() {
    jQuery('.slider-hide,.author-hide,.related-hide,.sidebar-area.widget-hide').remove();
});

jQuery(document).ready(function() {
    jQuery('#push').click(function() {
        jQuery(this).toggleClass("bt-menu-open");

        var jQuerynavigacia = jQuery('#main-navigation'),
            val = jQuerynavigacia.css('left') === '320px' ? '0px' : '320px';
        jQuerynavigacia.animate({
            left: val
        }, 300)
    });

});

(function(jQuery) {
    jQuery(window).load(function() {

        jQuery("#main-navigation").mCustomScrollbar({
            theme: "minimal"
        });

    });
})(jQuery);

jQuery(document).ready(function($) {
    jQuery(".social-icons a:nth-child(6)").after("<br>");
    /*
     * Let's fire off the gravatar function
     * You can remove this if you don't need it
     */
    loadGravatars();


}); /* end of as page load scripts */

jQuery(document).ready(function() {

    //Check to see if the window is top if not then display button
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 500) {
            jQuery('.scrollToTop').fadeIn();
        } else {
            jQuery('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    jQuery('.scrollToTop').click(function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });


});