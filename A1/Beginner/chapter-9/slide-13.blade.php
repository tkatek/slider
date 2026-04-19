<?php
$content = [
    'page_title' => 'Practice time',
    'title' => 'Practice time',
    'subtitle' => 'Choose the correct option',
    'questions' => [
        [
            'segments' => [
                'How ',
                ['answer' => 'much', 'wrong' => 'many'],
                ' tea do you drink everyday?',
            ],
        ],
        [
            'segments' => [
                'How ',
                ['answer' => 'much', 'wrong' => 'many'],
                ' sugar do you like in your tea?',
            ],
        ],
        [
            'segments' => [
                'How ',
                ['answer' => 'many', 'wrong' => 'much'],
                ' children are there in your family?',
            ],
        ],
        [
            'segments' => [
                'How ',
                ['answer' => 'much', 'wrong' => 'many'],
                ' money do you have in your pocket now?',
            ],
        ],
        [
            'segments' => [
                'How ',
                ['answer' => 'many', 'wrong' => 'much'],
                ' sweets did you buy?',
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
