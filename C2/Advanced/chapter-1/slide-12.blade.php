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
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Food for thought',
                    'emoji' => '💭',
                    'description' => 'Something to think about',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/.mp3'),
                ],
                [
                    'text' => 'Read between the lines',
                    'emoji' => '🔍',
                    'description' => 'Understand implied meaning',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/.mp3'),
                ],
                [
                    'text' => 'That’s a grey area',
                    'emoji' => '⚖️',
                    'description' => 'Not clear-cut',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/.mp3'),
                ],
                [
                    'text' => 'Play devil’s advocate',
                    'emoji' => '😈',
                    'description' => 'Argue the opposite view',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/.mp3'),
                ],
                [
                    'text' => 'Think it through',
                    'emoji' => '🧠',
                    'description' => 'Consider carefully',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])