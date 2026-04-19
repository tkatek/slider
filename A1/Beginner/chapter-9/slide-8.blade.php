<?php
$content = [
    'page_title' => 'Practice time',
    'title' => 'Practice time',
    'subtitle' => 'Choose the correct option',
    'questions' => [
        [
            'segments' => [
                'There ',
                ['answer' => 'are', 'wrong' => 'is'],
                ' a lot of oranges.',
            ],
        ],
        [
            'segments' => [
                'There ',
                ['answer' => 'are', 'wrong' => 'is'],
                ' some coconuts.',
            ],
        ],
        [
            'segments' => [
                'There ',
                ['answer' => 'is', 'wrong' => 'are'],
                ' a lot of flour.',
            ],
        ],
        [
            'segments' => [
                'There ',
                ['answer' => 'is', 'wrong' => 'are'],
                ' a lot of salt.',
            ],
        ],
        [
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
