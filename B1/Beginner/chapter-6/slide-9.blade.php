<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match The Words (A) With Their Meanings (B).',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'camping',
            'left' => [
                'type' => 'word',
                'text' => '1. Camping',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. Staying in a tent outdoors',
            ],
        ],
        [
            'id' => 'photography',
            'left' => [
                'type' => 'word',
                'text' => '2. Photography',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. Taking pictures',
            ],
        ],
        [
            'id' => 'gardening',
            'left' => [
                'type' => 'word',
                'text' => '3. Gardening',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. Growing flowers and plants',
            ],
        ],
        [
            'id' => 'cycling',
            'left' => [
                'type' => 'word',
                'text' => '4. Cycling',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. Riding a bicycle',
            ],
        ],
        [
            'id' => 'jogging',
            'left' => [
                'type' => 'word',
                'text' => '5. Jogging',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. Running slowly for exercise',
            ],
        ],
        [
            'id' => 'chatting',
            'left' => [
                'type' => 'word',
                'text' => '6. Chatting',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. Talking with friends',
            ],
        ],
        [
            'id' => 'cooking',
            'left' => [
                'type' => 'word',
                'text' => '7. Cooking',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. Preparing food',
            ],
        ],
        [
            'id' => 'swimming',
            'left' => [
                'type' => 'word',
                'text' => '8. Swimming',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'h. Moving through water',
            ],
        ],
    ],

    'right_order' => [
        'photography',
        'chatting',
        'camping',
        'gardening',
        'cycling',
        'jogging',
        'cooking',
        'swimming',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])