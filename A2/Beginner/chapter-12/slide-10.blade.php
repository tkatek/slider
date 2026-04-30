<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'Choose the right answer',
    'pool_item_type' => 'text',
    'desktop_game_width' => 55,
    'desktop_pool_width' => 45,

    'categories' => [
        'How much...?' => [
            'emoji' => '🥛',
            'items' => [
                'time',
                'litres',
                'milk',
                'sugar',
                'water',
                'coffee',
                'money',
            ],
        ],

        'How many...?' => [
            'emoji' => '👥',
            'items' => [
                'people',
                'kilograms',
                'hours',
                'eggs',
                'cents',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])