<?php

$content = [
    'title'    => 'Practice 9',
    'subtitle' => '',

    'instruction'      => 'Correct the mistakes.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'He must has gone out.'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'He must have gone out',
                    'answers' => [
                        'He must have gone out',
                        'He must have gone out.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => "Tyler can't have forgot."],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "Tyler can't have forgotten",
                    'answers' => [
                        "Tyler can't have forgotten",
                        "Tyler can't have forgotten.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'He might has had an emergency.'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'He might have had an emergency',
                    'answers' => [
                        'He might have had an emergency',
                        'He might have had an emergency.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'They could have went home.'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'They could have gone home',
                    'answers' => [
                        'They could have gone home',
                        'They could have gone home.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'Ava must have spoke to Tyler.'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Ava must have spoken to Tyler',
                    'answers' => [
                        'Ava must have spoken to Tyler',
                        'Ava must have spoken to Tyler.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])