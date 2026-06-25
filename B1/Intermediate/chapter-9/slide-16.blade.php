<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => '',

    'instruction'      => 'Complete each sentence using the correct relative pronoun',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',
    'card_class' => '[&_.lp-input]:!w-40 [&_.lp-input]:!min-w-0',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'The people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who', 'that'],
                ],
                ['text' => ' inspired me were my parents.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I read a book '],
                [
                    'blank' => true,
                    'answer' => 'which',
                    'answers' => ['which', 'that'],
                ],
                ['text' => ' changed my way of thinking.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Parents are people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who', 'that'],
                ],
                ['text' => ' support and guide us.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'I enjoy places '],
                [
                    'blank' => true,
                    'answer' => 'where',
                    'answers' => ['where'],
                ],
                ['text' => ' I can learn about different cultures.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'There was a time '],
                [
                    'blank' => true,
                    'answer' => 'when',
                    'answers' => ['when'],
                ],
                ['text' => ' I wanted to become an architect.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])