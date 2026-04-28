<?php
$content = [
    'title' => 'Quick wrap up!',
    'subtitle' => 'Read and fill in the sentences with the correct form of these verbs',

    'questions' => [
        [
            'prefix' => 'I',
            'suffix' => 'Spain last summer.',
            'hint' => 'visit',
            'answers' => ['visited'],
        ],
        [
            'prefix' => 'I',
            'suffix' => 'there by train.',
            'hint' => 'go',
            'answers' => ['went'],
        ],
        [
            'prefix' => 'I',
            'suffix' => 'in a hotel.',
            'hint' => 'stay',
            'answers' => ['stayed'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])