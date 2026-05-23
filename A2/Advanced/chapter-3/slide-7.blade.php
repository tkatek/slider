<?php

$content = [
    'page_title' => 'Practise 3',
    'title' => 'Practise 3',
    'subtitle' => 'Match the tools with the right job',

    'drag_item_type' => 'image-with-label',
    'pool_item_type' => 'image',
    'show_pool_item_labels' => true,

    'pool_grid_class' => 'grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 2xl:grid-cols-10',
    'category_grid_class' => 'grid-cols-2 md:grid-cols-3',
    'slot_grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'mobile_pool_visible_cap' => 4,
    'tablet_pool_visible_cap' => 6,

    'categories' => [
        'Doctor' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/stethoscope.webp'),
                    'text' => 'Stethoscope',
                    'alt' => 'stethoscope',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/thermometer.webp'),
                    'text' => 'Thermometer',
                    'alt' => 'thermometer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/syringe.webp'),
                    'text' => 'Syringe',
                    'alt' => 'syringe',
                ],
            ],
        ],

        'Nurse' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/gloves.webp'),
                    'text' => 'Medical gloves',
                    'alt' => 'medical gloves',
                ],
            ],
        ],

        'Police officer' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/handcuffs.webp'),
                    'text' => 'Handcuffs',
                    'alt' => 'handcuffs',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/whistle.webp'),
                    'text' => 'Whistle',
                    'alt' => 'whistle',
                ],
            ],
        ],

        'Firefighter' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/fire-hose.webp'),
                    'text' => 'Fire hose',
                    'alt' => 'fire hose',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'text' => 'Helmet',
                    'alt' => 'helmet',
                ],
            ],
        ],

        'Farmer' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/tractor.webp'),
                    'text' => 'Tractor',
                    'alt' => 'tractor',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/plough.webp'),
                    'text' => 'Plough',
                    'alt' => 'plough',
                ],
            ],
        ],

        'Construction worker' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/hammer.webp'),
                    'text' => 'Hammer',
                    'alt' => 'hammer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'text' => 'Safety helmet',
                    'alt' => 'safety helmet',
                ],
            ],
        ],

        'Postman' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/mailbag.webp'),
                    'text' => 'Mailbag',
                    'alt' => 'mailbag',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/bicycle.webp'),
                    'text' => 'Bicycle',
                    'alt' => 'bicycle',
                ],
            ],
        ],

        'Chef' => [
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/knife.webp'),
                    'text' => 'Knife',
                    'alt' => 'knife',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/frying-pan.webp'),
                    'text' => 'Frying pan',
                    'alt' => 'frying pan',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/apron.webp'),
                    'text' => 'Apron',
                    'alt' => 'apron',
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop-v2', ['content' => $content])