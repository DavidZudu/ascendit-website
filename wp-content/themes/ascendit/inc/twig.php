<?php

add_filter('timber/twig', function($twig) {
    $twig->addFilter(new Twig\TwigFilter('shortcode', 'do_shortcode'));
    return $twig;
});