<?php
$content = [

    'title'      => 'Practice 7',
    'subtitle'   => 'Drag and drop each keyword next to its definition',

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
