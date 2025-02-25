<?php
namespace Flynt\Components\BlockContentCircles;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockContentCircles', function ($data) {
    if (isset($data['options']['sectionAnchor'])) {
        $data['options']['sectionAnchorLabel'] = $data['options']['sectionAnchor'];
        $data['options']['sectionAnchor']      = preg_replace('/[^A-Za-z0-9]/', '-', strtolower($data['options']['sectionAnchor']));
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name'       => 'BlockContentCircles',
        'label'      => __('Block: Content Circles', 'flynt'),
        'sub_fields' => [
            [
                'label'     => __('Content', 'flynt'),
                'name'      => 'contentTab',
                'type'      => 'tab',
                'placement' => 'top',
                'endpoint'  => 0,
            ],
            FieldVariables\setIntro(),
            [
                'label'      => __('Entries', 'flynt'),
                'name'       => 'entries',
                'type'       => 'repeater',
                'sub_fields' => [
                    [
                        'label' => __('Image', 'flynt'),
                        'name'  => 'image',
                        'type'  => 'image',
                    ],
                    [
                        'label' => __('Content', 'flynt'),
                        'name'  => 'content',
                        'type'  => 'wysiwyg',
                    ],
                ],
            ],
            FieldVariables\setCTAs(),
            [
                'label'     => __('Options', 'flynt'),
                'name'      => 'optionsTab',
                'type'      => 'tab',
                'placement' => 'top',
                'endpoint'  => 0,
            ],
            [
                'label'      => '',
                'name'       => 'options',
                'type'       => 'group',
                'layout'     => 'row',
                'sub_fields' => [
                    [
                        'label'         => __('Max Columns', 'flynt'),
                        'name'          => 'maxColumns',
                        'type'          => 'select',
                        'default_value' => 'four',
                        'choices'       => [
                            'one'   => 'one',
                            'two'   => 'two',
                            'three' => 'three',
                            'four'  => 'four',
                        ],
                        'default_value' => 'two',
                        'wrapper'       => [
                            'width' => '50',
                        ],
                    ],                   
                    FieldVariables\setPadding(),

                    FieldVariables\setAnchor(),
                ],
            ],
        ],
    ];
}

// Options::addTranslatable('NavigationJs', [

// ]);

// Options::addGlobal('NavigationJs', [

// ]);
