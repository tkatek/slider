<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Type the correct word',

    'items' => [
        [
            'emoji'  => '💇',
            'prefix' => "I'd like to get my hair",
            'hint'   => 'trim',
            'suffix' => '.',
            'answer' => 'trimmed',
        ],
        [
            'emoji'  => '✂️',
            'prefix' => 'He',
            'hint'   => 'have',
            'suffix' => 'his hair cut every month.',
            'answer' => 'has',
        ],
        [
            'emoji'  => '🎨',
            'prefix' => 'Yesterday, I',
            'hint'   => 'get',
            'suffix' => 'my hair dyed.',
            'answer' => 'got',
        ],
        [
            'emoji'  => '💅',
            'prefix' => 'She has her nails',
            'hint'   => 'paint',
            'suffix' => 'every Friday.',
            'answer' => 'painted',
        ],
        [
            'emoji'  => '🚗',
            'prefix' => 'They got their car',
            'hint'   => 'repair',
            'suffix' => 'yesterday.',
            'answer' => 'repaired',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])