<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'natural-reactions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I think so. / Probably.',
                    'emoji' => '🤔',
                    'description' => 'You’re not sure',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-think-so-probably.mp3'),
                ],
                [
                    'text' => 'Not really.',
                    'emoji' => '🙅',
                    'description' => 'You disagree',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/not-really.mp3'),
                ],
                [
                    'text' => 'Oh, wow. / Seriously?',
                    'emoji' => '😮',
                    'description' => 'You’re surprised',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/oh-wow-seriously.mp3'),
                ],
                [
                    'text' => 'Let me think.',
                    'emoji' => '⏳',
                    'description' => 'You need time',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/let-me-think.mp3'),
                ],
                [
                    'text' => 'Actually… no.',
                    'emoji' => '🔄',
                    'description' => 'You change your mind',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/actually-no.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])