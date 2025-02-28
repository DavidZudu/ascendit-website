<?php
namespace Flynt\Components\BlockTextGrid;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockTextGrid', function ($data) {
    if (isset($data['options']['sectionAnchor'])) {
        $data['options']['sectionAnchorLabel'] = $data['options']['sectionAnchor'];
        $data['options']['sectionAnchor']      = preg_replace('/[^A-Za-z0-9]/', '-', strtolower($data['options']['sectionAnchor']));
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name'       => 'BlockTextGrid',
        'label'      => __('Block: Text Grid', 'flynt'),
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
                        'label' => __('Emoji', 'flynt'),
                        'name'  => 'emoji',
                        'type'  => 'text',
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

                    FieldVariables\setExtraClasses(),FieldVariables\setAnchor(),
                ],
            ],
        ],
    ];
}

// Options::addTranslatable('NavigationJs', [

// ]);

// Options::addGlobal('NavigationJs', [

// ]);
