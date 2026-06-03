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
                'text' => 'Stray dog',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'an animal without a home',
            ],
        ],
        [
            'id' => 'companion',
            'left' => [
                'type' => 'word',
                'text' => 'Companion',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a close friend who stays with you',
            ],
        ],
        [
            'id' => 'collapse',
            'left' => [
                'type' => 'word',
                'text' => 'Collapse',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'suddenly fall down',
            ],
        ],
        [
            'id' => 'rescue',
            'left' => [
                'type' => 'word',
                'text' => 'Rescue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'save someone from danger',
            ],
        ],
        [
            'id' => 'kindness',
            'left' => [
                'type' => 'word',
                'text' => 'Kindness',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'being caring and helpful',
            ],
        ],
        [
            'id' => 'reminder',
            'left' => [
                'type' => 'word',
                'text' => 'Reminder',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'something that helps you remember',
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