<?php

$content = [
    'title'    => 'Who Said It?',
    'subtitle' => 'Write C (Chris) or A (Ava).',

    'items' => [
        [
            'emoji'  => '😴',
            'prefix' => '',
            'hint'   => 'C/A',
            'suffix' => 'Tyler must have fallen asleep.',
            'answer' => 'A',
        ],
        [
            'emoji'  => '🍽️',
            'prefix' => '',
            'hint'   => 'C/A',
            'suffix' => "Tyler couldn't have forgotten about dinner.",
            'answer' => 'A',
        ],
        [
            'emoji'  => '🚶',
            'prefix' => '',
            'hint'   => 'C/A',
            'suffix' => 'Tyler might have gone out.',
            'answer' => 'C',
        ],
        [
            'emoji'  => '🚨',
            'prefix' => '',
            'hint'   => 'C/A',
            'suffix' => 'Tyler could have had an emergency.',
            'answer' => 'A',
        ],
        [
            'emoji'  => '🔔',
            'prefix' => '',
            'hint'   => 'C/A',
            'suffix' => 'Tyler must not have heard the bell.',
            'answer' => 'A',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])