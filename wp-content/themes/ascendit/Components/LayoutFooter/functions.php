<?php

namespace Flynt\Components\LayoutFooter;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber;

add_action('init', function () {
    register_nav_menus([
        'menu_footer_bottom' => __('Footer Bottom Menu', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=LayoutFooter', function ($data) {
    $data['contactOptions'] = Options::getGlobal('ContactInfo');
    $data['footerOptions'] = Options::getGlobal('LayoutFooter');
    $data['menuFooterBottom'] = Timber::get_menu('menu_footer_bottom') ?? Timber::get_pages_menu();
    $data['logo'] = wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', '', ["class" => "logo"]);
    $data['logoWhite'] = '<img class="logo" src="' . get_theme_mod('custom_white_logo') . '" alt="Vortex Logo">';

    return $data;
});

Options::addGlobal('LayoutFooter', [
    // FieldVariables\setCTAs(),
    [
        'label' => __('Form', 'flynt'),
        'name' => 'form',
        'type' => 'textarea',
        ],
    [
        'label' => __('Link Column', 'flynt'),
        'name' => 'linkColumns',
        'type' => 'repeater',
        'layout' => 'block',
        'button_label' => 'Add Column',
        'sub_fields' => [
            
            [
                'label' => __('Links', 'flynt'),
                'name' => 'links',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Link',
                'sub_fields' => [
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                        'wrapper' => [
                            'width' => 70,
                        ],

                    ],
                    [
                        'label' => __('Make button?', 'flynt'),
                        'name' => 'makeButton',
                        'type' => 'true_false',
                        'wrapper' => [
                            'width' => 30,
                        ],
                    ],
                ],
                'wrapper' => [
                    // 'width' => '60',
                ],
            ],
        ],
    ],
    [
        'label' => __('Copyright Text', 'flynt'),
        'name' => 'copyrightText',
        'type' => 'text',
    ],
]);
