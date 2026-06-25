<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the Words with Their Definitions',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'stray-dog',
            'left' => [
                'type' => 'word',
                'text' => '1. stray dog',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. an animal without a home',
            ],
        ],
        [
            'id' => 'companion',
            'left' => [
                'type' => 'word',
                'text' => '2. companion',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. a close friend who stays with you',
            ],
        ],
        [
            'id' => 'collapse',
            'left' => [
                'type' => 'word',
                'text' => '3. collapse',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. suddenly fall down',
            ],
        ],
        [
            'id' => 'rescue',
            'left' => [
                'type' => 'word',
                'text' => '4. rescue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. save someone from danger',
            ],
        ],
        [
            'id' => 'kindness',
            'left' => [
                'type' => 'word',
                'text' => '5. kindness',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. being caring and helpful',
            ],
        ],
        [
            'id' => 'reminder',
            'left' => [
                'type' => 'word',
                'text' => '6. reminder',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. something that helps you remember',
            ],
        ],
    ],

    'right_order' => [
        'companion',
        'rescue',
        'stray-dog',
        'collapse',
        'kindness',
        'reminder',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])