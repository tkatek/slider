<?php
$content = [
    'page_title' => 'Can you do this?',
    'title'      => 'Can you do this?',
    'subtitle'   => '',
    'questions'  => [
        [
            'segments' => [
                'My favourite time to work in the garden is ',
                ['answer' => 'in', 'wrong' => ['at', 'on']],
                ' spring.',
            ],
        ],
        [
            'segments' => [
                'The weather is very cold here ',
                ['answer' => 'at', 'wrong' => ['in', 'on']],
                ' night.',
            ],
        ],
        [
            'segments' => [
                ['answer' => 'In', 'wrong' => ['At', 'On']],
                " August, it's too hot to do anything.",
            ],
        ],
    ],
];
?>

@include('slider.game.dropdown-blanks', ['content' => $content])
