<?php

$content = [
    'title'    => 'Quick Practice',
    'subtitle' => 'Correct the verbs in the present simple tense',

    'instruction'      => '',
    'instruction_note' => 'Use the verb hint to complete each sentence',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'play',
                    'answers' => ['play'],
                ],
                ['text' => ' outdoors in the summer.'],
                ['text' => ' (play)'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'He '],
                [
                    'blank' => true,
                    'answer' => 'plays',
                    'answers' => ['plays'],
                ],
                ['text' => ' football in summer.'],
                ['text' => ' (play)'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => "doesn't like",
                    'answers' => ["doesn't like", 'does not like'],
                ],
                ['text' => ' winter.'],
                ['text' => ' (not / like)'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'It '],
                [
                    'blank' => true,
                    'answer' => 'rains',
                    'answers' => ['rains'],
                ],
                ['text' => ' in autumn.'],
                ['text' => ' (rain)'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'They '],
                [
                    'blank' => true,
                    'answer' => "don't go",
                    'answers' => ["don't go", 'do not go'],
                ],
                ['text' => ' on vacation in winter.'],
                ['text' => ' (not / go)'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])