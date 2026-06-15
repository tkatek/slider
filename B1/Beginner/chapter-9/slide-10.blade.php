<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => '',

    'instruction' => 'Correct the mistakes:',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'If I were you, I will talk to her about the problem.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I were you, I would talk to her about the problem',
                    'placeholder' => '...',
                    'answers' => [
                        'If I were you, I would talk to her about the problem',
                        'If I were you, I would talk to her about the problem.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'If I were you, I talk to her calmly.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I were you, I would talk to her calmly',
                    'placeholder' => '...',
                    'answers' => [
                        'If I were you, I would talk to her calmly',
                        'If I were you, I would talk to her calmly.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'If I am you, I would listen to her perspective.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I were you, I would listen to her perspective',
                    'placeholder' => '...',
                    'answers' => [
                        'If I were you, I would listen to her perspective',
                        'If I were you, I would listen to her perspective.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'If I were you, I would talked to her about your feelings.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'If I were you, I would talk to her about your feelings',
                    'placeholder' => '...',
                    'answers' => [
                        'If I were you, I would talk to her about your feelings',
                        'If I were you, I would talk to her about your feelings.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])