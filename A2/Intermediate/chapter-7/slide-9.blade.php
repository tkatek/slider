<?php

$content = [
    'title'    => 'Practice 4',
    'subtitle' => '',

    'instruction'      => 'Correct the mistakes',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 lg:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'is',
                    'answers' => ['is'],
                    'placeholder' => 'will',
                ],
                ['text' => ' going to study medicine next year.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'We are '],
                [
                    'blank' => true,
                    'answer' => 'going',
                    'answers' => ['going'],
                    'placeholder' => 'go',
                ],
                ['text' => ' to travel to Italy next summer.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'I am '],
                [
                    'blank' => true,
                    'answer' => 'going',
                    'answers' => ['going'],
                    'placeholder' => 'go',
                ],
                ['text' => ' to meet my friend tonight.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'The train '],
                [
                    'blank' => true,
                    'answer' => 'leaves',
                    'answers' => ['leaves'],
                    'placeholder' => 'will leaves',
                ],
                ['text' => ' at 6 p.m.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'I think it '],
                [
                    'blank' => true,
                    'answer' => 'will rain',
                    'answers' => ['will rain'],
                    'placeholder' => 'going',
                ],
                ['text' => ' later.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])