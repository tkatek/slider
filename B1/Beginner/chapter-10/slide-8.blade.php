<?php
$content = [
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the Words with Their Definitions',
    'left_label' => 'Words',
    'right_label' => 'Definitions',

    'pairs' => [
        [
            'id' => 'vanish',
            'left' => [
                'type' => 'word',
                'text' => '1. vanish',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. To disappear suddenly.',
            ],
        ],
        [
            'id' => 'magnifying-glass',
            'left' => [
                'type' => 'word',
                'text' => '2. magnifying glass',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. A tool that makes small things look larger.',
            ],
        ],
        [
            'id' => 'assume',
            'left' => [
                'type' => 'word',
                'text' => '3. assume',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. To think something is true without checking.',
            ],
        ],
        [
            'id' => 'crumbs',
            'left' => [
                'type' => 'word',
                'text' => '4. crumbs',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. Small pieces of food that fall from a larger piece.',
            ],
        ],
        [
            'id' => 'investigate',
            'left' => [
                'type' => 'word',
                'text' => '5. investigate',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. To try to find out what happened or discover the truth.',
            ],
        ],
        [
            'id' => 'clue',
            'left' => [
                'type' => 'word',
                'text' => '6. clue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. Something that helps you solve a mystery or problem.',
            ],
        ],
    ],

    'right_order' => [
        'assume',
        'crumbs',
        'vanish',
        'magnifying-glass',
        'clue',
        'investigate',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])