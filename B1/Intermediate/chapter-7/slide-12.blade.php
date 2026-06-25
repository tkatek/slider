<?php
$content = [
    'title' => 'Practice 4',
    'subtitle' => 'Sort out the adjectives',

    'categories' => [
        'Firstborn' => [
            'emoji' => '👑',
            'items' => [
                'responsible',
                'organized',
            ],
        ],
        'Middle Child' => [
            'emoji' => '🤝',
            'items' => [
                'creative',
                'flexible',
                'less noticed',
            ],
        ],
        'Youngest Child' => [
            'emoji' => '🌟',
            'items' => [
                'social',
                'funny',
                'risk-taking',
            ],
        ],
        'Only Child' => [
            'emoji' => '🎯',
            'items' => [
                'independent',
                'focused',
            ],
        ],
        'Twins' => [
            'emoji' => '👯',
            'items' => [
                'emotional',
            ],
        ],
        'Gap Child' => [
            'emoji' => '🌱',
            'items' => [
                'mature',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])