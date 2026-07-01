<?php

$content = [
    'title' => 'Practice 7',
    'subtitle' => 'Drag each word to its synonym',

    'categories' => [
        'brave' => [
            'emoji' => '🦁',
            'items' => [
                'courageous',
            ],
        ],
        'afraid' => [
            'emoji' => '😨',
            'items' => [
                'scared',
            ],
        ],
        'help' => [
            'emoji' => '🤝',
            'items' => [
                'assist',
            ],
        ],
        'guilty' => [
            'emoji' => '😟',
            'items' => [
                'ashamed',
            ],
        ],
        'strength' => [
            'emoji' => '💪',
            'items' => [
                'power',
            ],
        ],
        'known' => [
            'emoji' => '🌟',
            'items' => [
                'famous',
            ],
        ],
        'inspire' => [
            'emoji' => '🔥',
            'items' => [
                'motivate',
            ],
        ],
        'noticed' => [
            'emoji' => '👀',
            'items' => [
                'seen',
            ],
        ],
        'recognized' => [
            'emoji' => '🏅',
            'items' => [
                'acknowledged',
            ],
        ],
        'right' => [
            'emoji' => '✅',
            'items' => [
                'correct',
            ],
        ],
        'small' => [
            'emoji' => '🐜',
            'items' => [
                'tiny',
            ],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop', ['content' => $content])