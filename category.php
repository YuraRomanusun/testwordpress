<?php
/**
 * The template for displaying Category pages.
 *
 */
if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$templates = array( 'post-templates/category.twig', 'index.twig' );

$data = Timber::get_context();

$data['title'] = 'Overzicht';
$data['posts'] = Timber::get_posts();

$data['pagination'] = Timber::get_pagination();

Timber::render( $templates, $data );