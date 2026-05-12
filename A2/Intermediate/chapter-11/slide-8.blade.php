<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'Match the words with the emojis',

    'items_per_line_mobile' => 2,
    'items_per_line_tablet' => 4,
    'items_per_line' => 4,
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
