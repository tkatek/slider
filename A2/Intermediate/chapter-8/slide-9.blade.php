<?php

$content = [
    'title'    => 'Practice 3',
    'subtitle' => '',

    'instruction'      => 'Read the sentences & correct the mistake',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => "If I’ll work hard, I’ll pass the exam."],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I work hard, I’ll pass the exam.',
                    'answers' => [
                        'If I work hard, I’ll pass the exam.',
                        "If I work hard, I'll pass the exam.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'We won’t play golf this afternoon if it will rain.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'We won’t play golf this afternoon if it rains.',
                    'answers' => [
                        'We won’t play golf this afternoon if it rains.',
                        "We won't play golf this afternoon if it rains.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'If you drives too fast, you might have an accident.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If you drive too fast, you might have an accident.',
                    'answers' => [
                        'If you drive too fast, you might have an accident.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'If you don’t take a coat, you get cold.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If you don’t take a coat, you will get cold.',
                    'answers' => [
                        'If you don’t take a coat, you will get cold.',
                        "If you don't take a coat, you will get cold.",
                        'If you don’t take a coat, you’ll get cold.',
                        "If you don't take a coat, you'll get cold.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '5',
            'parts' => [
                ['text' => "If I won’t do some exercise, I’ll put on weight."],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I don’t do some exercise, I’ll put on weight.',
                    'answers' => [
                        'If I don’t do some exercise, I’ll put on weight.',
                        "If I don't do some exercise, I'll put on weight.",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])