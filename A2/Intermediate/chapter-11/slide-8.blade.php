<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'Match the words with the emojis',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-3 lg:grid-cols-1',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        '😊' => [
            'emoji' => '😊',
            'items' => [
                'happy',
            ],
        ],
        '😢' => [
            'emoji' => '😢',
            'items' => [
                'sad',
            ],
        ],
        '😠' => [
            'emoji' => '😠',
            'items' => [
                'angry',
            ],
        ],
        '😒' => [
            'emoji' => '😒',
            'items' => [
                'annoying',
            ],
        ],
        '☺️' => [
            'emoji' => '☺️',
            'items' => [
                'shy',
            ],
        ],
        '😲' => [
            'emoji' => '😲',
            'items' => [
                'surprise',
            ],
        ],
        '😭' => [
            'emoji' => '😭',
            'items' => [
                'crying',
            ],
        ],
        '😌' => [
            'emoji' => '😌',
            'items' => [
                'relax',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])