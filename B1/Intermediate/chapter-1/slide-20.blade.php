<?php

$content = [

    'type'       => 'emoji',
    'title'      => 'Quick Wrap up!',
    'subtitle'   => 'Choose the right answer.',

    'questions' => [
        [
            'emoji'   => '👨‍👦❌',
            'prompt'  => 'He . . . . . . . his son, they look completely different.',
            'correct' => "can't be",
            'options' => ['might be', "can't be", 'must not be'],
        ],
        [
            'emoji'   => '🚗🚦',
            'prompt'  => 'There\'s a bit of traffic, so I . . . . . . . arrive in time. Choose TWO correct options.',
            'correct' => ['might not', 'may not'],
            'options' => ['might not', 'must not', 'may not'],
        ],
        [
            'emoji'   => '😔👨',
            'prompt'  => 'He . . . . . . . be very proud of you right now. You disappointed him.',
            'correct' => "can't",
            'options' => ['must not', "can't", 'might'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])