<?php

$content = [
    'title'    => 'Quick wrap up!',
    'subtitle' => 'Read and fill in the sentences with the correct form of these verbs',

    'instruction'      => '',
    'instruction_note' => 'Use the verb hint to complete each sentence',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'visited',
                    'answers' => ['visited'],
                ],
                ['text' => ' Spain last summer.'],
                ['text' => ' (visit)'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'went',
                    'answers' => ['went'],
                ],
                ['text' => ' there by train.'],
                ['text' => ' (go)'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'stayed',
                    'answers' => ['stayed'],
                ],
                ['text' => ' in a hotel.'],
                ['text' => ' (stay)'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])