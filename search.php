<?php
$context = Timber::get_context();

$context['page'] = 'search';
$context['title'] = 'search';
Timber::render(array('search.twig' ), $context );