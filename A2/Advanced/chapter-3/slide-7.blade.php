<?php
$content = [
    'page_title' => 'Practise 3',
    'title' => 'Practise 3',
    'subtitle' => 'Match the tools with the right job',

    'pool_item_type' => 'image',
    'desktop_game_width' => 70,
    'desktop_pool_width' => 30,

    'categories' => [
        'Doctor' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/stethoscope.webp'),
                    'alt' => 'stethoscope',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/thermometer.webp'),
                    'alt' => 'thermometer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/syringe.webp'),
                    'alt' => 'syringe',
                ],
            ],
        ],

        'Nurse' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/gloves.webp'),
                    'alt' => 'medical gloves',
                ],
            ],
        ],

        'Police officer' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/handcuffs.webp'),
                    'alt' => 'handcuffs',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/whistle.webp'),
                    'alt' => 'whistle',
                ],
            ],
        ],

        'Firefighter' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/fire-hose.webp'),
                    'alt' => 'fire hose',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'alt' => 'helmet',
                ],
            ],
        ],

        'Farmer' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/tractor.webp'),
                    'alt' => 'tractor',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/plough.webp'),
                    'alt' => 'plough',
                ],
            ],
        ],

        'Construction worker' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/hammer.webp'),
                    'alt' => 'hammer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'alt' => 'safety helmet',
                ],
            ],
        ],

        'Postman' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/mailbag.webp'),
                    'alt' => 'mailbag',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/bicycle.webp'),
                    'alt' => 'bicycle',
                ],
            ],
        ],

        'Chef' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/knife.webp'),
                    'alt' => 'knife',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/frying-pan.webp'),
                    'alt' => 'frying pan',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/apron.webp'),
                    'alt' => 'apron',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
