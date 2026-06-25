<?php
$content = [

    'title' => 'Practice 3',
    'subtitle' => 'Match the verbs to their meanings',
    'activity_title' => 'Match the verbs from the vocabulary list with the correct meaning',
    'left_label' => 'Verb',
    'right_label' => 'Meaning',

    'pairs' => [
        [
            'id' => 'reply',
            'left' => [
                'type' => 'word',
                'text' => '1. reply',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. To answer a message, question, or request',
            ],
        ],
        [
            'id' => 'accept',
            'left' => [
                'type' => 'word',
                'text' => '2. accept',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. To agree to receive or allow something',
            ],
        ],
        [
            'id' => 'disappear',
            'left' => [
                'type' => 'word',
                'text' => '3. disappear',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. To stop being present or available',
            ],
        ],
        [
            'id' => 'connect',
            'left' => [
                'type' => 'word',
                'text' => '4. connect',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. To join or link with someone on a social platform',
            ],
        ],
    ],

    'right_order' => [
        'disappear',
        'reply',
        'accept',
        'connect',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])