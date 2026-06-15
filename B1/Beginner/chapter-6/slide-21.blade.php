<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Quick Wrap Up!',
    'subtitle' => '',

    'questions' => [
        [
            'emoji' => '🎲',
            'prompt' => 'If it rains when we’re on holiday, we usually stay in and . . . . . . . board games.',
            'correct' => 'play',
            'options' => ['play', 'do', 'make'],
        ],
        [
            'emoji' => '🏠',
            'prompt' => 'We stayed indoor because it was raining.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])