/* 
 * This file contains calls to various javascript files
 * 
 * Editing this file might lead to some broken theme features.
 * 
 */


/* Trigger home page slider */
/* Slider powered by FlexSlider by WooThemes */
jQuery(window).load(function() {
    jQuery('.flexslider').flexslider();

});


/* Trigger mobile responsive navigation powered by slicknav.js */
jQuery(document).ready(function($) {

    $('#main-nav #site-navigation ul').slicknav({prependTo: '#mobile-menu'});
});