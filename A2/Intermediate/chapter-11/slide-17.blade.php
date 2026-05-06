<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match the feeling with the correct action',
    'left_label' => 'Feelings',
    'right_label' => 'Actions',

    'pairs' => [
        [
            'id' => 'angry',
            'left' => [
                'type' => 'word',
                'text' => 'He is angry.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'He frowns.',
            ],
        ],
        [
            'id' => 'confused',
            'left' => [
                'type' => 'word',
                'text' => 'She is confused.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'She raises her eyebrows.',
            ],
        ],
        [
            'id' => 'unhappy',
            'left' => [
                'type' => 'word',
                'text' => 'He is unhappy.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'He pouts his lips.',
            ],
        ],
        [
            'id' => 'surprised',
            'left' => [
                'type' => 'word',
                'text' => 'She is surprised.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'She drops her jaw.',
            ],
        ],
        [
            'id' => 'thinking',
            'left' => [
                'type' => 'word',
                'text' => 'He is thinking.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'He scrunches up his nose.',
            ],
        ],
        [
            'id' => 'silly',
            'left' => [
                'type' => 'word',
                'text' => 'She is being silly.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'She sticks her tongue out.',
            ],
        ],
    ],

    'right_order' => [
        'confused',
        'angry',
        'silly',
        'thinking',
        'surprised',
        'unhappy',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])
