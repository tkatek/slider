<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => '',

    'instruction'      => 'Complete the sentence',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Emily was too '],
                [
                    'blank' => true,
                    'answer' => 'shy',
                    'answers' => ['shy'],
                ],
                ['text' => ' to stand up to the bullies at first.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Heroes often show great '],
                [
                    'blank' => true,
                    'answer' => 'bravery',
                    'answers' => ['bravery'],
                ],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Emily decided not to '],
                [
                    'blank' => true,
                    'answer' => 'hesitate',
                    'answers' => ['hesitate'],
                ],
                ['text' => ' and took action.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'Her story went '],
                [
                    'blank' => true,
                    'answer' => 'viral',
                    'answers' => ['viral'],
                ],
                ['text' => ' on social media.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'Everyone has the '],
                [
                    'blank' => true,
                    'answer' => 'potential',
                    'answers' => ['potential'],
                ],
                ['text' => ' to be a hero.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])