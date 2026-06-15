<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Correct the Mistakes',

    'instruction'      => 'Rewrite each sentence correctly',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => '❌ I should have went to bed earlier.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I should have gone to bed earlier',
                    'placeholder' => 'Write the correct sentence...',
                    'answers' => [
                        'I should have gone to bed earlier',
                        'I should have gone to bed earlier.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => '❌ She shouldn\'t have ate so much chocolate.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She shouldn\'t have eaten so much chocolate',
                    'placeholder' => 'Write the correct sentence...',
                    'answers' => [
                        'She shouldn\'t have eaten so much chocolate',
                        'She shouldn\'t have eaten so much chocolate.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => '❌ They should has listened to the teacher.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'They should have listened to the teacher',
                    'placeholder' => 'Write the correct sentence...',
                    'answers' => [
                        'They should have listened to the teacher',
                        'They should have listened to the teacher.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])