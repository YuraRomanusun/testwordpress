<?php
/*
Template Name: Menu/Catering
*/
?>
<?php
$context = Timber::get_context();
$templates = array('page-templates/menu.twig', 'page.twig');
$post = new TimberPost();

$context['post'] = $post;
$context['page'] = 'menu';


Timber::render($templates, $context);