<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Choose the correct past form.',

    'questions' => [
        [
            'emoji' => '🚶',
            'prompt' => 'go',
            'correct' => 'went',
            'options' => ['goed', 'went']
        ],
        [
            'emoji' => '🍽️',
            'prompt' => 'eat',
            'correct' => 'ate',
            'options' => ['ate', 'eated']
        ],
        [
            'emoji' => '✅',
            'prompt' => 'do',
            'correct' => 'did',
            'options' => ['doed', 'did']
        ],
        [
            'emoji' => '⚽',
            'prompt' => 'play',
            'correct' => 'played',
            'options' => ['plaied', 'played']
        ],
        [
            'emoji' => '📚',
            'prompt' => 'study',
            'correct' => 'studied',
            'options' => ['studied', 'studyied']
        ],
        [
            'emoji' => '📸',
            'prompt' => 'take',
            'correct' => 'took',
            'options' => ['taked', 'took']
        ],
        [
            'emoji' => '🛠️',
            'prompt' => 'make',
            'correct' => 'made',
            'options' => ['maked', 'made']
        ],
        [
            'emoji' => '🛍️',
            'prompt' => 'buy',
            'correct' => 'bought',
            'options' => ['buyed', 'bought']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])