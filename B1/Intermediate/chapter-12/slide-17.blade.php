<?php

$content = [
    'title'    => 'Quick wrap up!',
    'subtitle' => 'Complete with the correct verb form',

    'items' => [
        [
            'emoji'  => '👂',
            'prefix' => 'I believe in',
            'hint'   => 'listen',
            'suffix' => 'to others.',
            'answer' => 'listening',
        ],
        [
            'emoji'  => '🤝',
            'prefix' => 'We should focus on',
            'hint'   => 'respect',
            'suffix' => 'different opinions.',
            'answer' => 'respecting',
        ],
        [
            'emoji'  => '⚖️',
            'prefix' => 'She apologized for',
            'hint'   => 'judge',
            'suffix' => 'people too quickly.',
            'answer' => 'judging',
        ],
        [
            'emoji'  => '🧩',
            'prefix' => 'They succeeded in',
            'hint'   => 'solve',
            'suffix' => 'the problem together.',
            'answer' => 'solving',
        ],
        [
            'emoji'  => '🌍',
            'prefix' => 'We can learn from',
            'hint'   => 'hear',
            'suffix' => 'different viewpoints.',
            'answer' => 'hearing',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])