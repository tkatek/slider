<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Complete the sentence',

    'items' => [
        [
            'emoji'  => '🙈',
            'prefix' => 'Emily was too',
            'hint'   => '',
            'suffix' => 'to stand up to the bullies at first.',
            'answer' => 'shy',
        ],
        [
            'emoji'  => '🦸',
            'prefix' => 'Heroes often show great',
            'hint'   => '',
            'suffix' => '.',
            'answer' => 'bravery',
        ],
        [
            'emoji'  => '⚡',
            'prefix' => 'Emily decided not to',
            'hint'   => '',
            'suffix' => 'and took action.',
            'answer' => 'hesitate',
        ],
        [
            'emoji'  => '📱',
            'prefix' => 'Her story went',
            'hint'   => '',
            'suffix' => 'on social media.',
            'answer' => 'viral',
        ],
        [
            'emoji'  => '🌟',
            'prefix' => 'Everyone has the',
            'hint'   => '',
            'suffix' => 'to be a hero.',
            'answer' => 'potential',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])