<?php

$content = [
    'title'    => 'Practice 9',
    'subtitle' => '',

    'instruction'      => 'Read the definitions and write the sports and activities',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'An activity where people sleep outside in tents:'],
                [
                    'blank' => true,
                    'answer' => 'camping',
                    'placeholder' => 'Write the activity',
                    'answers' => ['camping', 'Camping'],
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'An activity where people practise their acting skills:'],
                [
                    'blank' => true,
                    'answer' => 'drama',
                    'placeholder' => 'Write the activity',
                    'answers' => ['drama', 'Drama'],
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'A sport or activity where people ride a bike:'],
                [
                    'blank' => true,
                    'answer' => 'cycling',
                    'placeholder' => 'Write the activity',
                    'answers' => ['cycling', 'Cycling', 'BMXing', 'bmxing', 'BMX'],
                ],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'An activity where people dance with a partner using steps and movements:'],
                [
                    'blank' => true,
                    'answer' => 'ballroom dancing',
                    'placeholder' => 'Write the activity',
                    'answers' => ['ballroom dancing', 'Ballroom dancing', 'Ballroom Dancing'],
                ],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'A sport or activity where people do physical exercise indoors, sometimes using bars or ropes:'],
                [
                    'blank' => true,
                    'answer' => 'gymnastics',
                    'placeholder' => 'Write the activity',
                    'answers' => ['gymnastics', 'Gymnastics'],
                ],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'A sport where two teams hit a ball over a high net with their hands:'],
                [
                    'blank' => true,
                    'answer' => 'volleyball',
                    'placeholder' => 'Write the activity',
                    'answers' => ['volleyball', 'Volleyball'],
                ],
            ],
        ],
        [
            'speaker' => '7',
            'parts' => [
                ['text' => 'An activity for people who love spending money:'],
                [
                    'blank' => true,
                    'answer' => 'shopping',
                    'placeholder' => 'Write the activity',
                    'answers' => ['shopping', 'Shopping'],
                ],
            ],
        ],
        [
            'speaker' => '8',
            'parts' => [
                ['text' => 'An activity where people practise their skill with a camera:'],
                [
                    'blank' => true,
                    'answer' => 'photography',
                    'placeholder' => 'Write the activity',
                    'answers' => ['photography', 'Photography'],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])