<?php
$content = [
    'title' => 'Practise 3',
    'subtitle' => 'Match the tools with the right job',
    'pool_item_type' => 'image',
    'image_text_style' => 'overlay',

    'categories' => [
        'Doctor' => [
            'emoji' => '🩺',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/stethoscope.webp'),
                    'text'  => 'Stethoscope',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/thermometer.webp'),
                    'text'  => 'Thermometer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/syringe.webp'),
                    'text'  => 'Syringe',
                ],
            ],
        ],
        'Nurse' => [
            'emoji' => '👩‍⚕️',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/gloves.webp'),
                    'text'  => 'Medical gloves',
                ],
            ],
        ],
        'Police officer' => [
            'emoji' => '👮',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/handcuffs.webp'),
                    'text'  => 'Handcuffs',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/whistle.webp'),
                    'text'  => 'Whistle',
                ],
            ],
        ],
        'Firefighter' => [
            'emoji' => '🧑‍🚒',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/fire-hose.webp'),
                    'text'  => 'Fire hose',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'text'  => 'Helmet',
                ],
            ],
        ],
        'Farmer' => [
            'emoji' => '🧑‍🌾',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/tractor.webp'),
                    'text'  => 'Tractor',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/plough.webp'),
                    'text'  => 'Plough',
                ],
            ],
        ],
        'Construction worker' => [
            'emoji' => '👷',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/hammer.webp'),
                    'text'  => 'Hammer',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                    'text'  => 'Safety helmet',
                ],
            ],
        ],
        'Postman' => [
            'emoji' => '📮',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/mailbag.webp'),
                    'text'  => 'Mailbag',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/bicycle.webp'),
                    'text'  => 'Bicycle',
                ],
            ],
        ],
        'Chef' => [
            'emoji' => '👨‍🍳',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/knife.webp'),
                    'text'  => 'Knife',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/frying-pan.webp'),
                    'text'  => 'Frying pan',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/apron.webp'),
                    'text'  => 'Apron',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])