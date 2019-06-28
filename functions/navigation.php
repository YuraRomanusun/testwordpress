<?php

/**
 * Register Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */

register_nav_menus(array(
    'top-bar' => 'Top Bar', // registers the menu in the WordPress admin menu editor
));

/**
 * Top bar
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
function nav_top_bar() {
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => '',                        // class of container
        'menu' => 'Top Bar',                                   // menu name
        'menu_class' => 'top-bar-menu',            // adding custom nav class
        'theme_location' => 'top-bar',                // where it's located in the theme
        'before' => '',                                 // before each link <a>
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
        'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
    ));
}