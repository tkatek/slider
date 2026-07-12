<?php

$content = [
    'title'    => 'Complete the expressions',
    'subtitle' => '',

    'items' => [
        [
            'emoji'  => '🚀',
            'prefix' => 'Take',
            'suffix' => '',
            'answer' => 'action',
        ],
        [
            'emoji'  => '🌟',
            'prefix' => 'Make a',
            'suffix' => '',
            'answer' => 'difference',
        ],
        [
            'emoji'  => '👣',
            'prefix' => 'Reduce our',
            'suffix' => 'footprint',
            'answer' => 'carbon',
        ],
        [
            'emoji'  => '⚡',
            'prefix' => 'Switch to',
            'suffix' => 'energy',
            'answer' => 'renewable',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])