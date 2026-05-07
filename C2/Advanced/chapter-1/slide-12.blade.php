<?php
$content = [
    'page_title' => '',
    'title' => 'New Language',
    'subtitle' => 'Slang time!',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'slang-time-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Food for thought',
                    'emoji' => '💭',
                    'description' => 'Something to think about',
                    'sound' => null,
                ],
                [
                    'text' => 'Read between the lines',
                    'emoji' => '🔍',
                    'description' => 'Understand implied meaning',
                    'sound' => null,
                ],
                [
                    'text' => 'That’s a grey area',
                    'emoji' => '⚖️',
                    'description' => 'Not clear-cut',
                    'sound' => null,
                ],
                [
                    'text' => 'Play devil’s advocate',
                    'emoji' => '😈',
                    'description' => 'Argue the opposite view',
                    'sound' => null,
                ],
                [
                    'text' => 'Think it through',
                    'emoji' => '🧠',
                    'description' => 'Consider carefully',
                    'sound' => null,
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])