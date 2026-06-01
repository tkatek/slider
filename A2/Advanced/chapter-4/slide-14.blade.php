<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Find the mistake! Each sentence has one mistake',

    'instruction'      => 'Write the correct sentence',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I has lived in this city for two months.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I have lived in this city for two months.',
                    'answers' => [
                        'I have lived in this city for two months.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Have you ever saw a famous person?'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Have you ever seen a famous person?',
                    'answers' => [
                        'Have you ever seen a famous person?',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'She has visit the new library today.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She has visited the new library today.',
                    'answers' => [
                        'She has visited the new library today.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => "They haven’t never tried the local food."],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "They haven’t tried the local food.",
                    'answers' => [
                        "They haven’t tried the local food.",
                        "They have never tried the local food.",
                        "They haven't tried the local food.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'My friend have been to the bank already.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'My friend has been to the bank already.',
                    'answers' => [
                        'My friend has been to the bank already.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])