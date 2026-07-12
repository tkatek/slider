<?php

$content = [
    'title' => 'Practice 7',
    'subtitle' => '',
    'activity_title' => 'Match the statements.',
    'left_label' => 'Statements',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'garage',
            'left' => [
                'type' => 'word',
                'text' => 'a. I got the car serviced.',
            ],
            'right' => [
                'type' => 'word',
                'text' => '5. I went to a garage.',
            ],
        ],
        [
            'id' => 'hairdresser',
            'left' => [
                'type' => 'word',
                'text' => 'b. She had her hair cut.',
            ],
            'right' => [
                'type' => 'word',
                'text' => "4. She went to the hairdresser's.",
            ],
        ],
        [
            'id' => 'photographer',
            'left' => [
                'type' => 'word',
                'text' => "c. He'll develop the film.",
            ],
            'right' => [
                'type' => 'word',
                'text' => "2. He's a photographer.",
            ],
        ],
        [
            'id' => 'painting',
            'left' => [
                'type' => 'word',
                'text' => 'd. Pam painted her house.',
            ],
            'right' => [
                'type' => 'word',
                'text' => '3. She likes painting.',
            ],
        ],
        [
            'id' => 'mechanic',
            'left' => [
                'type' => 'word',
                'text' => 'e. I serviced the car.',
            ],
            'right' => [
                'type' => 'word',
                'text' => "6. I'm a mechanic.",
            ],
        ],
        [
            'id' => 'burglary',
            'left' => [
                'type' => 'word',
                'text' => 'f. Our house was burgled.',
            ],
            'right' => [
                'type' => 'word',
                'text' => "1. We're the victims of a burglary.",
            ],
        ],
    ],

    'right_order' => [
        'burglary',
        'photographer',
        'painting',
        'hairdresser',
        'garage',
        'mechanic',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])