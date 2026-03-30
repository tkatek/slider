<?php
$content = [
    'page_title' => 'Practice time',
    'title'      => 'Practice time',
    'subtitle'   => 'Choose the correct option',
    'questions'  => [
        [
            'img'      => '🍊',
            'segments' => [
                'There ',
                ['answer' => 'are', 'wrong' => 'is'],
                ' a lot of oranges.',
            ],
        ],
        [
            'img'      => '🥥',
            'segments' => [
                'There ',
                ['answer' => 'are', 'wrong' => 'is'],
                ' some coconuts.',
            ],
        ],
        [
            'img'      => '🌾',
            'segments' => [
                'There ',
                ['answer' => 'is', 'wrong' => 'are'],
                ' a lot of flour.',
            ],
        ],
        [
            'img'      => '🧂',
            'segments' => [
                'There ',
                ['answer' => 'is', 'wrong' => 'are'],
                ' a lot of salt.',
            ],
        ],
        [
            'img'      => '🍓',
            'segments' => [
                'There is a lot of ',
                ['answer' => 'jam', 'wrong' => 'lemons'],
                '.',
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])