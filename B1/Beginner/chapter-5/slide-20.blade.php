<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => '',

    'instruction'      => 'Correct the mistakes',


    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'People is playing volleyball.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'People are playing volleyball',
                    'placeholder' => 'People...',
                    'answers' => [
                        'People are playing volleyball',
                        'People are playing volleyball.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'She wear sunglasses.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She wears sunglasses',
                    'placeholder' => 'She...',
                    'answers' => [
                        'She wears sunglasses',
                        'She wears sunglasses.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'We are going to Alexandria every summer.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'We go to Alexandria every summer',
                    'placeholder' => 'We...',
                    'answers' => [
                        'We go to Alexandria every summer',
                        'We go to Alexandria every summer.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])