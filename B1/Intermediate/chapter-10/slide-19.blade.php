<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => '',

    'instruction'      => 'Fill in the Blanks',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 ',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Jessica and Mark were taking a '],
                [
                    'blank' => true,
                    'answer' => 'walk',
                    'answers' => ['walk'],
                ],
                ['text' => ' in New York City.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'A dangerous '],
                [
                    'blank' => true,
                    'answer' => 'truck',
                    'answers' => ['truck'],
                ],
                ['text' => ' lost control and headed toward the sidewalk.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'A '],
                [
                    'blank' => true,
                    'answer' => 'shopkeeper',
                    'answers' => ['shopkeeper'],
                ],
                ['text' => ' warned the crowd about the danger.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'Firefighters and '],
                [
                    'blank' => true,
                    'answer' => 'paramedics',
                    'answers' => ['paramedics'],
                ],
                ['text' => ' arrived to help people.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'The story teaches us that courage, kindness, and '],
                [
                    'blank' => true,
                    'answer' => 'teamwork',
                    'answers' => ['teamwork'],
                ],
                ['text' => ' can save lives.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])