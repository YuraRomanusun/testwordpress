<?php

//Navigation
require_once('functions/navigation.php');

// Enqueue scripts and styles
require_once('functions/enqueue-assets.php');

// Add theme support
require_once('functions/theme-support.php');

// Main TimberSite class
require_once('functions/timber.php');

// ACF
require_once('functions/acf.php');

// Custom php
require_once('functions/custom.php');

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'allow_dev_auto_core_updates', '__return_false' );
