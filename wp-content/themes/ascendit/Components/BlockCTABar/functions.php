<?php

namespace Flynt\Components\BlockCTABar;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockCTABar', function ($data) {
    if (isset($data['options']['sectionAnchor'])) {
        $data['options']['sectionAnchorLabel'] = $data['options']['sectionAnchor'];
        $data['options']['sectionAnchor'] = preg_replace('/[^A-Za-z0-9]/', '-', strtolower($data['options']['sectionAnchor']));
    }

    

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockCTABar',
        'label' => __('Block: CTA Bar', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            FieldVariables\setIntro(),
            [
            'label' => __('Emoji', 'flynt'),
            'name' => 'emoji',
            'type' => 'text',
            ],
            FieldVariables\setCtas(),
            
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\setContainerSize('container-none'),
                    FieldVariables\setBackgroundColor(),
                    // FieldVariables\setPadding(),
                    // FieldVariables\setPaddingSize(),
                    FieldVariables\setBackgroundPattern(),
                    FieldVariables\setAdditionalText(),
                    FieldVariables\setExtraClasses(),FieldVariables\setAnchor()
                ]
            ]
        ]
    ];
}


// Options::addTranslatable('NavigationJs', [

// ]);

// Options::addGlobal('NavigationJs', [
   
// ]);