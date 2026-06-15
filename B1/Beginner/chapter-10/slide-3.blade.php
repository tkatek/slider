<?php
$content = [
    'title' => 'Practice 1: Warm-up',
    'subtitle' => 'Let’s revise some verbs conjugations',

    'categories' => [
        'Base Form' => [
            'emoji' => '',
            'items' => [
                'speak',
                'write',
                'grow',
                'get',
                'see',
                'give',
                'go',
                'know',
                'is',
            ],
        ],
        'Past Simple' => [
            'emoji' => '',
            'items' => [
                'saw',
                'wrote',
                'got',
                'gave',
                'spoke',
                'knew',
                'went',
                'was',
                'grew',
            ],
        ],
        'Past Participle' => [
            'emoji' => '',
            'items' => [
                'given',
                'spoken',
                'grown',
                'been',
                'written',
                'known',
                'seen',
                'gone',
                'gotten',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])