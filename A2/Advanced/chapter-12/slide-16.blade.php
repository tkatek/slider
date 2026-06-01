<?php

$content = [
    'page_title' => 'Quick wrap-up',
    'title'      => 'Quick wrap-up!',
    'subtitle'   => '',

    'instruction'      => 'Correct the mistakes in the sentences',
    'instruction_note' => '',

    'grid_class' => 'md:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'She’s always '],
                [
                    'blank' => true,
                    'answer' => 'using',
                    'answers' => ['using'],
                    'placeholder' => 'use',
                ],
                ['text' => ' my phone charger.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'They’re always '],
                [
                    'blank' => true,
                    'answer' => 'making',
                    'answers' => ['making'],
                    'placeholder' => 'are making',
                ],
                ['text' => ' noise at night.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'My roommate is always '],
                [
                    'blank' => true,
                    'answer' => 'forgetting',
                    'answers' => ['forgetting'],
                    'placeholder' => 'forgetting',
                ],
                ['text' => ' to clean the kitchen.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'You are always '],
                [
                    'blank' => true,
                    'answer' => 'interrupting',
                    'answers' => ['interrupting'],
                    'placeholder' => 'interrupt',
                ],
                ['text' => ' me!'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])