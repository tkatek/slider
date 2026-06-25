<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Choose the correct answers',

    'questions' => [
        [
            'emoji'   => '🚌',
            'prompt'  => 'Maybe she missed the bus.',
            'correct' => 'She might have missed the bus.',
            'options' => [
                'She might missed the bus.',
                'She might have missed the bus.',
                'She might have miss the bus.',
            ],
        ],
        [
            'emoji'   => '⚠️',
            'prompt'  => "I'm sure there was some mistake.",
            'correct' => 'There must have been some mistake.',
            'options' => [
                'There must been some mistake.',
                'There must be some mistake.',
                'There must have been some mistake.',
            ],
        ],
        [
            'emoji'   => '🤔',
            'prompt'  => "Perhaps he didn't understand.",
            'correct' => 'He might not have understood.',
            'options' => [
                'He might not have understood.',
                'He might have understood.',
                'He might not understood.',
            ],
        ],
        [
            'emoji'   => '😮',
            'prompt'  => "I'm sure they didn't realize.",
            'correct' => "They can't have realized.",
            'options' => [
                'They can realized.',
                'They can have realized.',
                "They can't have realized.",
            ],
        ],
        [
            'emoji'   => '🏠',
            'prompt'  => 'It’s possible Alissa went home early.',
            'correct' => 'Alissa might have gone home early.',
            'options' => [
                'Alissa might has gone home early.',
                'Alissa might have gone home early.',
                'Alissa might gone home early.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])