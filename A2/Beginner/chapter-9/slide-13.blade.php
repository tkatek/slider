<?php
$content = [
    'page_title' => 'PHYSICAL APPEARANCE & PERSONALITY',
    'title' => 'Drag and drop',
    'subtitle' => 'Sort the words into the correct category',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Physical Appearance' => [
            'emoji' => '👤',
            'items' => [
                'blonde',
                'plump',
                'moustache',
                'curly',
                'thin',
                'middle-aged',
                'beard',
                'old',
                'freckles',
            ],
        ],
        'Personality' => [
            'emoji' => '😊',
            'items' => [
                'arrogant',
                'generous',
                'humble',
                'selfish',
                'talkative',
                'sociable',
                'patient',
                'honest',
                'friendly',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])