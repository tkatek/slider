<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match the sentence halves',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'b',
            'left' => [
                'type' => 'word',
                'text' => '1. A true friend is someone',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. who listens to me.',
            ],
        ],
        [
            'id' => 'a',
            'left' => [
                'type' => 'word',
                'text' => '2. I admire people',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. who respects others.',
            ],
        ],
        [
            'id' => 'e',
            'left' => [
                'type' => 'word',
                'text' => '3. Good friends are people',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. who care about each other.',
            ],
        ],
        [
            'id' => 'd',
            'left' => [
                'type' => 'word',
                'text' => '4. I trust friends',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. who keep their promises.',
            ],
        ],
        [
            'id' => 'c',
            'left' => [
                'type' => 'word',
                'text' => '5. A kind person is someone',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. who help others.',
            ],
        ],
    ],

    'right_order' => [
        'a',
        'b',
        'c',
        'd',
        'e',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])