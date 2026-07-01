<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => 'Drag each word to its correct meaning',

    'categories' => [
        'quiet and nervous around people' => [
            'emoji' => '😶',
            'items' => [
                'shy',
            ],
        ],
        'preferring to be alone' => [
            'emoji' => '🧘',
            'items' => [
                'introverted',
            ],
        ],
        'strong interest' => [
            'emoji' => '✨',
            'items' => [
                'fascination',
            ],
        ],
        'very brave and admirable' => [
            'emoji' => '🦸',
            'items' => [
                'heroic',
            ],
        ],
        'to think pleasant thoughts' => [
            'emoji' => '💭',
            'items' => [
                'daydream',
            ],
        ],
        'to hurt or frighten someone' => [
            'emoji' => '⚠️',
            'items' => [
                'bully',
            ],
        ],
        'feeling bad about something' => [
            'emoji' => '😟',
            'items' => [
                'guilty',
            ],
        ],
        'feeling embarrassed' => [
            'emoji' => '😳',
            'items' => [
                'ashamed',
            ],
        ],
        'the strength to do something difficult' => [
            'emoji' => '💪',
            'items' => [
                'courage',
            ],
        ],
        'showing courage' => [
            'emoji' => '🛡️',
            'items' => [
                'bravery',
            ],
        ],
        'not giving up' => [
            'emoji' => '🔥',
            'items' => [
                'determination',
            ],
        ],
        'to pause before acting' => [
            'emoji' => '🤔',
            'items' => [
                'hesitate',
            ],
        ],
        'to help someone' => [
            'emoji' => '🤝',
            'items' => [
                'lend a hand',
            ],
        ],
        'having the ability to do something great' => [
            'emoji' => '🌟',
            'items' => [
                'potential',
            ],
        ],
        'not seen or recognized' => [
            'emoji' => '👀',
            'items' => [
                'unnoticed',
            ],
        ],
        'not appreciated' => [
            'emoji' => '🏅',
            'items' => [
                'unrecognized',
            ],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop', ['content' => $content])