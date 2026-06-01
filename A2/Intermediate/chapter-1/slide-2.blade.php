<?php
$content = [
    'title' => 'Practice 1',
    'subtitle' => 'Let’s remember about countries & nationalities',
    'pool_item_type' => 'image',

    'categories' => [
        'French' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/france.webp'),
                    'alt' => 'France flag',
                ],
            ],
        ],
        'Canadian' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/canada.webp'),
                    'alt' => 'Canada flag',
                ],
            ],
        ],
        'Moroccan' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/morocco.webp'),
                    'alt' => 'Morocco flag',
                ],
            ],
        ],
        'Sudanese' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/sudan.webp'),
                    'alt' => 'Sudan flag',
                ],
            ],
        ],
        'Spanish' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/spain.webp'),
                    'alt' => 'Spain flag',
                ],
            ],
        ],
        'Saudi Arabian' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/saudi-arabia.webp'),
                    'alt' => 'Saudi Arabia flag',
                ],
            ],
        ],
        'Jordanian' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/jordan.webp'),
                    'alt' => 'Jordan flag',
                ],
            ],
        ],
        'American' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/usa.webp'),
                    'alt' => 'United States flag',
                ],
            ],
        ],
        'British / English' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/british.webp'),
                    'alt' => 'United Kingdom flag',
                ],
            ],
        ],
        'Egyptian' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/egypt.webp'),
                    'alt' => 'Egypt flag',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
