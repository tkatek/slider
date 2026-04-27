<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the word with the correct definition',

    'pairs' => [
        [
            'id' => 'lucky',
            'left' => [
                'type' => 'word',
                'text' => 'Lucky',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Bringing good fortune',
            ],
        ],
        [
            'id' => 'skip',
            'left' => [
                'type' => 'word',
                'text' => 'Skip',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To leave something out',
            ],
        ],
        [
            'id' => 'unlucky',
            'left' => [
                'type' => 'word',
                'text' => 'Unlucky',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Bringing bad fortune',
            ],
        ],
        [
            'id' => 'superstition',
            'left' => [
                'type' => 'word',
                'text' => 'Superstition',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A belief that is not based on facts',
            ],
        ],
        [
            'id' => 'culture',
            'left' => [
                'type' => 'word',
                'text' => 'Culture',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'The traditions and beliefs of a group of people',
            ],
        ],
        [
            'id' => 'symbol',
            'left' => [
                'type' => 'word',
                'text' => 'Symbol',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Something that represents an idea',
            ],
        ],
        [
            'id' => 'penny',
            'left' => [
                'type' => 'word',
                'text' => 'Penny',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A small coin in the U.S.',
            ],
        ],
    ],

    'right_order' => [
        'superstition',
        'symbol',
        'lucky',
        'culture',
        'skip',
        'penny',
        'unlucky',
    ],
];
?>

@include('slider.game.match-pairs', ['content' => $content])
