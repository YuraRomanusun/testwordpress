<?php

// add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
// function blankslate_load_scripts()
// {
//     wp_enqueue_script( 'jquery' );
// }

wp_deregister_script( 'jquery' );


// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '2.1.0', false );

//jQuery first, then Popper.js, then Bootstrap JS
wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', null, '3.3.1', true );
wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', null, '3.3.1', true );
wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', null, '3.3.1', true );

//Google Map API
wp_enqueue_script('google_js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBRrm4CdyZSVFtZA0YB8add3qvGmJrZuDw', '', '5.0.3', true);

//Carousel
wp_enqueue_script( 'carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', null, '1.0.0', true );

//Twig
wp_enqueue_script( 'twig', get_template_directory_uri() . '/js/twig.min.js', null, '1.0.0', true );




//Custom JS
wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom/main.js?d='.time(), null, '1.0.0', true );


