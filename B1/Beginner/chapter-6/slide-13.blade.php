<?php

$content = [
    'title'    => 'Quick Practice!',
    'subtitle' => '',

    'instruction' => 'Correct the mistakes:',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I prefer read books.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I prefer reading books',
                    'placeholder' => 'I prefer...',
                    'answers' => [
                        'I prefer reading books',
                        'I prefer reading books.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'You should trying new activities.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'You should try new activities',
                    'placeholder' => 'You should...',
                    'answers' => [
                        'You should try new activities',
                        'You should try new activities.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'I’m open for new experiences.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I’m open to new experiences',
                    'placeholder' => 'I’m open...',
                    'answers' => [
                        'I’m open to new experiences',
                        'I’m open to new experiences.',
                        "I'm open to new experiences",
                        "I'm open to new experiences.",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])