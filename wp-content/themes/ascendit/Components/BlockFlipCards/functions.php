<?php
namespace Flynt\Components\BlockFlipCards;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockFlipCards', function ($data) {
    if (isset($data['options']['sectionAnchor'])) {
        $data['options']['sectionAnchorLabel'] = $data['options']['sectionAnchor'];
        $data['options']['sectionAnchor']      = preg_replace('/[^A-Za-z0-9]/', '-', strtolower($data['options']['sectionAnchor']));
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name'       => 'BlockFlipCards',
        'label'      => __('Block: Flip Cards', 'flynt'),
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
                'label'      => __('Columns', 'flynt'),
                'name'       => 'columns',
                'type'       => 'repeater',
                'button_label'=> __('Add Column', 'flynt'), // Custom button label
                'sub_fields' => [
                    [
                        'label'      => __('Entries', 'flynt'),
                        'name'       => 'entries',
                        'type'       => 'repeater',
                        'button_label'=> __('Add Entry', 'flynt'), // Custom button label
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                            'label' => __('Ratio', 'flynt'),
                            'name' => 'ratio',
                            'type' => 'number',
                            ],
                            [
                                'label' => __('Title', 'flynt'),
                                'name'  => 'title',
                                'type'  => 'text',
                            ],
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
