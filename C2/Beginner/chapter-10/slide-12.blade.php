<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'natural-english-slang-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Kind of / Kinda',
                    'emoji' => '💬',
                    'description' => 'I’m kinda tired.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/kind-of-kinda.mp3'),
                ],
                [
                    'text' => 'To be honest',
                    'emoji' => '🗣️',
                    'description' => 'To be honest, I disagree.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/to-be-honest.mp3'),
                ],
                [
                    'text' => 'You know',
                    'emoji' => '🤔',
                    'description' => 'It’s hard, you know?',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/you-know.mp3'),
                ],
                [
                    'text' => 'Not really',
                    'emoji' => '➖',
                    'description' => 'Not really, no.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/not-really.mp3'),
                ],
                [
                    'text' => 'I mean',
                    'emoji' => '🎯',
                    'description' => 'I mean, that’s not my point.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/i-mean.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])