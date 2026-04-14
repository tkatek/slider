<?php
$content = [
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'Drag and drop each keyword next to its definition',

    'cards_grid' => 'grid-cols-2 sm:grid-cols-4',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'buy food' => [
            'emoji' => '🛒',
            'items' => [
                'Supermarket',
            ],
        ],
        'get money' => [
            'emoji' => '🏦',
            'items' => [
                'Bank',
            ],
        ],
        'ride the train' => [
            'emoji' => '🚆',
            'items' => [
                'Train station',
            ],
        ],
        'ride the bus' => [
            'emoji' => '🚌',
            'items' => [
                'Bus stop',
            ],
        ],
        'go for a walk or play' => [
            'emoji' => '🌳',
            'items' => [
                'Park',
            ],
        ],
        'eat food' => [
            'emoji' => '🍽️',
            'items' => [
                'Restaurant',
            ],
        ],
        'buy medicine' => [
            'emoji' => '💊',
            'items' => [
                'Pharmacy',
            ],
        ],
        'mail letters' => [
            'emoji' => '📮',
            'items' => [
                'Post office',
            ],
        ],
        'watch movies' => [
            'emoji' => '🎬',
            'items' => [
                'Movie theater',
            ],
        ],
        'stay when sick' => [
            'emoji' => '🏥',
            'items' => [
                'Hospital',
            ],
        ],
        'buy coffee' => [
            'emoji' => '☕',
            'items' => [
                'Cafe',
            ],
        ],
        'call firefighters' => [
            'emoji' => '🚒',
            'items' => [
                'Fire station',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])
