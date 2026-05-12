<?php
$content = [
    'title' => 'Writing',
    'subtitle' => 'Write the correct word',
    'focus_note' => 'Sad - Happy - Angry - Scared - Bored - Shy - Hungry - Thirsty - Hot - Sick',

    'questions' => [
        [
            'prefix' => '😊',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['happy'],
        ],
        [
            'prefix' => '😢',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['sad'],
        ],
        [
            'prefix' => '😠',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['angry'],
        ],
        [
            'prefix' => '😨',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['scared'],
        ],
        [
            'prefix' => '😐',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['bored'],
        ],
        [
            'prefix' => '☺️',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['shy'],
        ],
        [
            'prefix' => '😋',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['hungry'],
        ],
        [
            'prefix' => '🥤',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['thirsty'],
        ],
        [
            'prefix' => '🥵',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['hot'],
        ],
        [
            'prefix' => '🤒',
            'suffix' => '',
            'hint' => 'feeling',
            'answers' => ['sick'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])