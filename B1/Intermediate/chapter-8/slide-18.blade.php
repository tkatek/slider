<?php
$content = [
    'title' => 'Practice 7',
    'subtitle' => '',
    'activity_title' => 'Match the phrasal verbs with their meanings',
    'left_label' => 'Phrasal Verbs',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'hang-out',
            'left' => [
                'type' => 'word',
                'text' => '1. hang out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. spend time together socially',
            ],
        ],
        [
            'id' => 'worked-out',
            'left' => [
                'type' => 'word',
                'text' => '2. worked out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. found a solution',
            ],
        ],
        [
            'id' => 'came-out',
            'left' => [
                'type' => 'word',
                'text' => '3. came out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. became available',
            ],
        ],
        [
            'id' => 'check-out',
            'left' => [
                'type' => 'word',
                'text' => '4. check out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. visit or explore a place',
            ],
        ],
        [
            'id' => 'ate-out',
            'left' => [
                'type' => 'word',
                'text' => '5. ate out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. went out to eat at a restaurant',
            ],
        ],
        [
            'id' => 'turned-out',
            'left' => [
                'type' => 'word',
                'text' => '6. turned out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. happened / proved to be',
            ],
        ],
        [
            'id' => 'left-out',
            'left' => [
                'type' => 'word',
                'text' => '7. left out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. not included',
            ],
        ],
    ],

    'right_order' => [
        'turned-out',
        'ate-out',
        'left-out',
        'hang-out',
        'worked-out',
        'check-out',
        'came-out',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])