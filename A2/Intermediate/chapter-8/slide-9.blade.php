<?php
$content = [
    'title' => 'Practice 3',
    'subtitle' => 'Read the sentences & correct the mistake',
    'stacked_full_input' => true,


    'questions' => [
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => "If I’ll work hard, I’ll pass the exam.",
            'answers' => [
                'If I work hard, I’ll pass the exam.',
                "If I work hard, I'll pass the exam.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'We won’t play golf this afternoon if it will rain.',
            'answers' => [
                'We won’t play golf this afternoon if it rains.',
                "We won't play golf this afternoon if it rains.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'If you drives too fast, you might have an accident.',
            'answers' => [
                'If you drive too fast, you might have an accident.',
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'If you don’t take a coat, you get cold.',
            'answers' => [
                'If you don’t take a coat, you will get cold.',
                "If you don't take a coat, you will get cold.",
                'If you don’t take a coat, you’ll get cold.',
                "If you don't take a coat, you'll get cold.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => "If I won’t do some exercise, I’ll put on weight.",
            'answers' => [
                'If I don’t do some exercise, I’ll put on weight.',
                "If I don't do some exercise, I'll put on weight.",
            ],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
