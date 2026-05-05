<?php
$content = [
    'page_title' => 'Practise Time',
    'title' => 'Practise Time',
    'subtitle' => 'Drag and Drop',

    'pool_item_type' => 'image',
    'desktop_game_width' => 70,
    'desktop_pool_width' => 30,

    'categories' => [
        'Chocolate consultant' => [
            'emoji' => '🍫',
            'items' => [
                // Add the correct image path here when ready.
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/chocolate-consultant.webp'),
            ],
        ],

        'Professional sleeper' => [
            'emoji' => '🛏️',
            'items' => [
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-sleeper.webp'),
            ],
        ],

        'Water slide tester' => [
            'emoji' => '🌊',
            'items' => [
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/water-slide-tester.webp'),
            ],
        ],

        'Pet food taster' => [
            'emoji' => '🐾',
            'items' => [
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/pet-food-taster.webp'),
            ],
        ],

        'Paper towel sniffer' => [
            'emoji' => '👃',
            'items' => [
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/paper-towel-sniffer.webp'),
            ],
        ],

        'Professional mourner' => [
            'emoji' => '🖤',
            'items' => [
                materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-mourner.webp'),
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])