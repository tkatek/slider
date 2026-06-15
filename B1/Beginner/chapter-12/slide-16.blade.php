<?php

$content = [
    'title'    => 'Complete the Sentences',
    'subtitle' => 'Complete using should have or shouldn\'t have.',

    'instruction'      => '',
    'instruction_note' => 'Use should have or shouldn\'t have to complete each sentence',

    'grid_class' => 'grid-cols-1 ',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Emma '],
                [
                    'blank' => true,
                    'answer' => 'should have',
                    'answers' => ['should have'],
                ],
                ['text' => ' left home earlier for the airport.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Tyler '],
                [
                    'blank' => true,
                    'answer' => "shouldn't have",
                    'answers' => ["shouldn't have", 'should not have'],
                ],
                ['text' => ' shouted at his friend during the argument.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])