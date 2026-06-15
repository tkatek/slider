<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => '',

    'instruction' => 'Correct the mistakes:',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => '"I wish I will go to the party."'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Correct:'],
                [
                    'blank' => true,
                    'answer' => 'I wish I could go to the party',
                    'placeholder' => 'I wish I...',
                    'answers' => [
                        'I wish I could go to the party',
                        'I wish I could go to the party.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => '"I wish I studied more yesterday."'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Correct:'],
                [
                    'blank' => true,
                    'answer' => 'I wish I had studied more yesterday',
                    'placeholder' => 'I wish I...',
                    'answers' => [
                        'I wish I had studied more yesterday',
                        'I wish I had studied more yesterday.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])