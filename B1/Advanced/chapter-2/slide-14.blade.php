<?php
$content = [

    'title' => 'Practice 6',
    'subtitle' => '',
    'activity_title' => 'Match each sentence on the left with its meaning on the right',
    'left_label' => 'Sentence',
    'right_label' => 'Meaning',

    'pairs' => [
        [
            'id' => 'scare',
            'left' => [
                'type' => 'word',
                'text' => '1. It won’t scare her.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. I’m sure it won’t scare her.',
            ],
        ],
        [
            'id' => 'painting_set',
            'left' => [
                'type' => 'word',
                'text' => '2. She might like the painting set.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. It’s possible that she’ll like the painting set.',
            ],
        ],
        [
            'id' => 'forgotten_present',
            'left' => [
                'type' => 'word',
                'text' => '3. He must have forgotten his present.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. I’m almost certain he forgot his present.',
            ],
        ],
        [
            'id' => 'teddy_bear',
            'left' => [
                'type' => 'word',
                'text' => '4. She should enjoy the teddy bear.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. It’s likely that she’ll enjoy the teddy bear.',
            ],
        ],
        [
            'id' => 'wrong_gift',
            'left' => [
                'type' => 'word',
                'text' => '5. It can’t be the wrong gift.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. It’s impossible that it’s the wrong gift.',
            ],
        ],
    ],

    'right_order' => [
        'teddy_bear',
        'scare',
        'painting_set',
        'wrong_gift',
        'forgotten_present',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])