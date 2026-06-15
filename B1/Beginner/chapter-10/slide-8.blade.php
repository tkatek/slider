<?php
$content = [

    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the Words with Their Definitions',
    'left_label' => 'Words',
    'right_label' => 'Definitions',

    'pairs' => [
        [
            'id' => 'c',
            'left' => [
                'type' => 'word',
                'text' => 'Vanish',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To disappear suddenly.',
            ],
        ],
        [
            'id' => 'd',
            'left' => [
                'type' => 'word',
                'text' => 'Magnifying glass',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A tool that makes small things look larger.',
            ],
        ],
        [
            'id' => 'a',
            'left' => [
                'type' => 'word',
                'text' => 'Assume',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To think something is true without checking.',
            ],
        ],
        [
            'id' => 'b',
            'left' => [
                'type' => 'word',
                'text' => 'Crumbs',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Small pieces of food that fall from a larger piece.',
            ],
        ],
        [
            'id' => 'f',
            'left' => [
                'type' => 'word',
                'text' => 'Investigate',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To try to find out what happened or discover the truth.',
            ],
        ],
        [
            'id' => 'e',
            'left' => [
                'type' => 'word',
                'text' => 'Clue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Something that helps you solve a mystery or problem.',
            ],
        ],
    ],

    'right_order' => [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])