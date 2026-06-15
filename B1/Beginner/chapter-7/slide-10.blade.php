<?php

$content = [
    'title'    => 'Practice 4',
    'subtitle' => '',

    'instruction'      => 'Write PRESENT, FUTURE, or PAST.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I wish I had a car like that.'],
                [
                    'blank' => true,
                    'answer' => 'PRESENT',
                    'placeholder' => '. . . . . . .',
                    'answers' => ['PRESENT', 'present', 'Present'],
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I wish it would stop raining.'],
                [
                    'blank' => true,
                    'answer' => 'FUTURE',
                    'placeholder' => '. . . . . . .',
                    'answers' => ['FUTURE', 'future', 'Future'],
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'I wish I had taken a different route.'],
                [
                    'blank' => true,
                    'answer' => 'PAST',
                    'placeholder' => '. . . . . . .',
                    'answers' => ['PAST', 'past', 'Past'],
                ],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'I wish more people were as kind as you.'],
                [
                    'blank' => true,
                    'answer' => 'PRESENT',
                    'placeholder' => '. . . . . . .',
                    'answers' => ['PRESENT', 'present', 'Present'],
                ],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'I wish you would stop dreaming and mow the lawn.'],
                [
                    'blank' => true,
                    'answer' => 'FUTURE',
                    'placeholder' => '. . . . . . .',
                    'answers' => ['FUTURE', 'future', 'Future'],
                ],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => "I wish I hadn't brought this stupid umbrella."],
                [
                    'blank' => true,
                    'answer' => 'PAST',
                    'placeholder' => '. . . . . . . ',
                    'answers' => ['PAST', 'past', 'Past'],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])