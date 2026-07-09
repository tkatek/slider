<?php
$content = [
    'title'    => 'True or False',
    'subtitle' => '',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => 'Reverse vending machines recycle plastic bottles.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'The office uses less electricity now.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Leftover food is thrown away every evening.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Glasses can be reused many times.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'More than half of the staff use the carpooling system.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])