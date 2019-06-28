<?php
/*
Template Name: Book Us
*/
?>
<?php
$context = Timber::get_context();
$templates = array('page-templates/book-us.twig', 'page.twig');
$post = new TimberPost();

$context['post'] = $post;
$context['page'] = 'book us';


Timber::render($templates, $context);