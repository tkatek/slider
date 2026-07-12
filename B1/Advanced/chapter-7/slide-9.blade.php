<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the vocabulary words (1-6) with their correct definitions (A-F).',
    'left_label' => 'Words',
    'right_label' => 'Definitions',

    'pairs' => [
        [
            'id' => 'barber',
            'left' => [
                'type' => 'word',
                'text' => '1. Barber',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. A person whose job is to cut men’s hair and groom beards.',
            ],
        ],
        [
            'id' => 'chef',
            'left' => [
                'type' => 'word',
                'text' => '2. Chef',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. A person whose job is to cook.',
            ],
        ],
        [
            'id' => 'mansion',
            'left' => [
                'type' => 'word',
                'text' => '3. Mansion',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. A large, luxurious house.',
            ],
        ],
        [
            'id' => 'limousine',
            'left' => [
                'type' => 'word',
                'text' => '4. Limousine',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. A very long car used to carry important or rich people.',
            ],
        ],
        [
            'id' => 'umbrella',
            'left' => [
                'type' => 'word',
                'text' => '5. Umbrella',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. A device used to protect you from rain.',
            ],
        ],
        [
            'id' => 'wealthy',
            'left' => [
                'type' => 'word',
                'text' => '6. Wealthy',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. Having a lot of money.',
            ],
        ],
    ],

    'right_order' => [
        'barber',
        'chef',
        'mansion',
        'limousine',
        'umbrella',
        'wealthy',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])