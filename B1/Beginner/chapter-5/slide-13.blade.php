<?php

$content = [
    'title'    => 'Practice 5',
    'subtitle' => '',

    'instruction'      => 'Complete with the correct form',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'People usually '],
                [
                    'blank' => true,
                    'answer' => 'eat',
                    'answers' => ['eat'],
                ],
                ['text' => ' fish and chips at the seaside.'],
                ['text' => ' (eat)'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'The children '],
                [
                    'blank' => true,
                    'answer' => 'are laughing',
                    'answers' => ['are laughing'],
                ],
                ['text' => ' at Mr Punch now.'],
                ['text' => ' (laugh)'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Many tourists '],
                [
                    'blank' => true,
                    'answer' => 'visit',
                    'answers' => ['visit'],
                ],
                ['text' => ' Blackpool every summer.'],
                ['text' => ' (visit)'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'The boys '],
                [
                    'blank' => true,
                    'answer' => 'are playing',
                    'answers' => ['are playing'],
                ],
                ['text' => ' driving games at the arcade today.'],
                ['text' => ' (play)'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])