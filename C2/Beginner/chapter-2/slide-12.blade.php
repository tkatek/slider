<?php

$content = [
    'page_title' => '',
    'title' => 'New Language',
    'subtitle' => 'Slang time!',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'argument-opinion-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Back it up',
                    'emoji' => '📌',
                    'description' => 'Support your idea',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide12/back-it-up.mp3'),
                ],
                [
                    'text' => 'Make a strong case',
                    'emoji' => '💪',
                    'description' => 'Argue well',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide12/make-a-strong-case.mp3'),
                ],
                [
                    'text' => 'See both sides',
                    'emoji' => '⚖️',
                    'description' => 'Understand pros & cons',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide12/see-both-sides.mp3'),
                ],
                [
                    'text' => 'That holds weight',
                    'emoji' => '🏋️',
                    'description' => 'It’s convincing',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide12/that-holds-weight.mp3'),
                ],
                [
                    'text' => 'Think critically',
                    'emoji' => '🧠',
                    'description' => 'Analyze deeply',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide12/think-critically.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])