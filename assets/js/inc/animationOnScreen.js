var j = jQuery.noConflict();
/**
 * Script affichant les élements avec animation keyframe uniquement lorsqu'ils sont visible à l'écran
 */
(function ($, window, document, undefined) {
    'use strict';
    var animationObject;

    function nvsAddAnimation() {
        if(animationObject) {
            animationObject.each(function (index, element) {
                var $currentElement =  j(element),
                    animationType = $currentElement.attr('nvs-animation-type');
    
                if (nvsOnScreen($currentElement)) {
                    $currentElement.addClass('animated ' + animationType);
                }
            });
        }
    }

    // Fonction Gloable : 
    document.nvsResetAnimation = function () {
        if(animationObject) {
            animationObject.each(function (index, element) {
                var $currentElement =  j(element),
                    animationType = $currentElement.attr('nvs-animation-type');
    
                $currentElement.removeClass('animated ' + animationType);                
            });
        }
    }

    // takes jQuery(element) a.k.a. $('element')
    function nvsOnScreen(element) {
        // window bottom edge
        var windowBottomEdge =  j(window).scrollTop() +  j(window).height();

        // element top edge
        var elementTopEdge = element.offset().top;
        var offset = 100;

        // if element is between window's top and bottom edges
        return elementTopEdge + offset <= windowBottomEdge;
    }

    j(window).load(function () {
        animationObject = j('[nvs-animation-type]');
        nvsAddAnimation();
    });

    j(window).on('scroll', function (e) {
        nvsAddAnimation();
    });
}(jQuery, window, document));