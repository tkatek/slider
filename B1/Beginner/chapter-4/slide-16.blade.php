<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 6',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '🎬💥',
            'prompt'  => 'The action movie was . . . . . . .',
            'correct' => 'exciting',
            'options' => ['excited', 'exciting']
        ],
        [
            'emoji'   => '👻😨',
            'prompt'  => 'I was . . . . . . . when I watched the horror movie.',
            'correct' => 'scared',
            'options' => ['scary', 'scared']
        ],
        [
            'emoji'   => '👻🎬',
            'prompt'  => 'The horror movie was . . . . . . .',
            'correct' => 'scary',
            'options' => ['scared', 'scary']
        ],
        [
            'emoji'   => '🎥📚',
            'prompt'  => 'I was . . . . . . . in what I learned from the documentary.',
            'correct' => 'interested',
            'options' => ['interested', 'interesting']
        ],
        [
            'emoji'   => '📚🎬',
            'prompt'  => 'The documentary was . . . . . . .',
            'correct' => 'interesting',
            'options' => ['interested', 'interesting']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])