<?php
// Might be relating to ACF nav fields
// explained: https://wordpress.stackexchange.com/a/355097/161743
// fix from: https://stackoverflow.com/questions/59080288/getting-a-fatal-error-when-i-try-to-customize-theme

add_filter('wp_get_nav_menu_items', 'my_wp_get_nav_menu_items', 10, 3);
function my_wp_get_nav_menu_items($items, $menu, $args) {
    foreach($items as $key => $item)
        $items[$key]->description = '';

    return $items;
}