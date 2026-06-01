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
            'id' => 'favour',
            'left' => [
                'type' => 'word',
                'text' => 'Favour',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Help that someone asks for',
            ],
        ],
        [
            'id' => 'feed',
            'left' => [
                'type' => 'word',
                'text' => 'Feed',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To give food to',
            ],
        ],
        [
            'id' => 'lend',
            'left' => [
                'type' => 'word',
                'text' => 'Lend',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To give something temporarily',
            ],
        ],
        [
            'id' => 'take-care-of',
            'left' => [
                'type' => 'word',
                'text' => 'Take care of',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To look after something',
            ],
        ],
        [
            'id' => 'move-into',
            'left' => [
                'type' => 'word',
                'text' => 'Move into',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To begin living in a new place',
            ],
        ],
    ],

    'right_order' => [
        'lend',
        'take-care-of',
        'favour',
        'feed',
        'move-into',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])