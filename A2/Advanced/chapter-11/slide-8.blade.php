<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the words with their definitions',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'undercooked',
            'left' => [
                'type' => 'word',
                'text' => '1. Undercooked',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. not cooked enough',
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
                'text' => 'e. the main cook in a restaurant',
            ],
        ],
        [
            'id' => 'patience',
            'left' => [
                'type' => 'word',
                'text' => '3. Patience',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. waiting calmly',
            ],
        ],
        [
            'id' => 'offer',
            'left' => [
                'type' => 'word',
                'text' => '4. Offer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. to give something',
            ],
        ],
        [
            'id' => 'bill',
            'left' => [
                'type' => 'word',
                'text' => '5. Bill',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. the paper showing the total cost',
            ],
        ],
    ],

    'right_order' => [
        'offer',
        'patience',
        'undercooked',
        'bill',
        'chef',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])