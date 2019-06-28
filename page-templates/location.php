<?php
/*
Template Name: Location
*/
?>
<?php
$context = Timber::get_context();
$templates = array('page-templates/location.twig', 'page.twig');
$post = new TimberPost();

$context['post'] = $post;
$context['page'] = 'location';


Timber::render($templates, $context);