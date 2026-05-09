<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => '',
    'activity_title' => 'Match each word with the correct meaning.',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'get-homesick',
            'left' => [
                'type' => 'word',
                'text' => 'get homesick',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. feeling sad because you miss home',
            ],
        ],
        [
            'id' => 'hug',
            'left' => [
                'type' => 'word',
                'text' => 'hug',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. to hold someone close with your arms',
            ],
        ],
        [
            'id' => 'nagging',
            'left' => [
                'type' => 'word',
                'text' => 'nagging',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. when someone keeps annoying you again and again',
            ],
        ],
        [
            'id' => 'relearn',
            'left' => [
                'type' => 'word',
                'text' => 'relearn',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. to learn something again',
            ],
        ],
        [
            'id' => 'miss',
            'left' => [
                'type' => 'word',
                'text' => 'miss',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. to feel sad because someone or something is not with you',
            ],
        ],
        [
            'id' => 'adapt',
            'left' => [
                'type' => 'word',
                'text' => 'adapt',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. to change to fit a new situation',
            ],
        ],
        [
            'id' => 'goals',
            'left' => [
                'type' => 'word',
                'text' => 'goals',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. things you want to achieve',
            ],
        ],
    ],

    'right_order' => [
        'relearn',
        'adapt',
        'hug',
        'get-homesick',
        'goals',
        'miss',
        'nagging',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])