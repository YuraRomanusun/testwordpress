/*jslint unparam: true, browser: true, indent: 2 */
(function($, window, document, undefined) {
    'use strict';

    // cache global & much used references
    var $doc = $(document),
        $window = $(window);

    $doc.ready(function(jQuery) {
        
    	/*
        *   Top Menu
        */
        $window.scroll(function() {
            if ($doc.scrollTop() > $window.height() * 0.10) {
                $('.header').addClass('header-scroll');
            } else {
                $('.header').removeClass('header-scroll');
            }
        });


        /*
        *   Map
        */

        if($("#map").length) {
            var mapContainer = document.getElementById('map');
            var position = {lat: parseFloat($('#locLat').val()), lng: parseFloat($('#locLng').val())};
            var map = new google.maps.Map(mapContainer, {
            center: position,
            zoom: 16,
            scrollwheel: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false
            });
            var marker = new google.maps.Marker({
                position: position,
                map: map
            });
        }


        /*
        *   Open Google Map
        */
        $('.map-container #openMap').on('click', function(){
            if ($('#locLat').val() && $('#locLng').val()) {
                
               window.open("https://maps.google.com/maps?q=" + $('#locLat').val() + "," + $('#locLng').val() + "&z=5"); 
            }
        });



        $('#testimonial-carousel').owlCarousel({
            loop:true,
            margin:50,
            nav:false,
            dots:true,
            dotsEach: true,
            autoplay:false,
            autoplayTimeout: 5000,
            responsive:{
              360:{
                items:1
              },
              480:{
                items:2
              }
            }
          
        });
    });

}(jQuery, window, document));