<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match The Words (A) With Their Meanings (B).',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'camping',
            'left' => [
                'type' => 'word',
                'text' => 'Camping',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Staying In A Tent Outdoors',
            ],
        ],
        [
            'id' => 'photography',
            'left' => [
                'type' => 'word',
                'text' => 'Photography',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Taking Pictures',
            ],
        ],
        [
            'id' => 'gardening',
            'left' => [
                'type' => 'word',
                'text' => 'Gardening',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Growing Flowers And Plants',
            ],
        ],
        [
            'id' => 'cycling',
            'left' => [
                'type' => 'word',
                'text' => 'Cycling',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Riding A Bicycle',
            ],
        ],
        [
            'id' => 'jogging',
            'left' => [
                'type' => 'word',
                'text' => 'Jogging',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Running Slowly For Exercise',
            ],
        ],
        [
            'id' => 'chatting',
            'left' => [
                'type' => 'word',
                'text' => 'Chatting',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Talking With Friends',
            ],
        ],
        [
            'id' => 'cooking',
            'left' => [
                'type' => 'word',
                'text' => 'Cooking',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Preparing Food',
            ],
        ],
        [
            'id' => 'swimming',
            'left' => [
                'type' => 'word',
                'text' => 'Swimming',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Moving Through Water',
            ],
        ],
    ],

    'right_order' => [
        'photography',
        'chatting',
        'camping',
        'gardening',
        'cycling',
        'jogging',
        'cooking',
        'swimming',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])