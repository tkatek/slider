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
                'text' => '1. favour',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. help that someone asks for',
            ],
        ],
        [
            'id' => 'feed',
            'left' => [
                'type' => 'word',
                'text' => '2. feed',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. to give food to',
            ],
        ],
        [
            'id' => 'lend',
            'left' => [
                'type' => 'word',
                'text' => '3. lend',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. to give something temporarily',
            ],
        ],
        [
            'id' => 'take-care-of',
            'left' => [
                'type' => 'word',
                'text' => '4. take care of',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. to look after something',
            ],
        ],
        [
            'id' => 'move-into',
            'left' => [
                'type' => 'word',
                'text' => '5. move into',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. to begin living in a new place',
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