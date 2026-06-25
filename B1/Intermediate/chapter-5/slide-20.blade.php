<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => 'Present Perfect or Past Simple',

    'instruction'      => 'Fill in the present perfect simple or the past simple.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'saw',
                    'answers' => ['saw'],
                ],
                ['text' => ' a great film yesterday.'],
                ['text' => ' (see)'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Have you ever bought',
                    'answers' => ['Have you ever bought', 'have you ever bought'],
                ],
                ['text' => ' a cheap laptop?'],
                ['text' => ' (you ever buy)'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Sue '],
                [
                    'blank' => true,
                    'answer' => 'had',
                    'answers' => ['had'],
                ],
                ['text' => ' the flu last winter.'],
                ['text' => ' (have)'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'He '],
                [
                    'blank' => true,
                    'answer' => 'has already taken',
                    'answers' => ['has already taken', "'s already taken"],
                ],
                ['text' => ' the bus to get there.'],
                ['text' => ' (already take)'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])