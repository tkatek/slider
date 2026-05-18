<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'natural-english-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Honestly / I think',
                    'emoji' => '💬',
                    'description' => 'From my point of view',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/honestly-i-think.mp3'),
                ],
                [
                    'text' => 'It depends',
                    'emoji' => '🤔',
                    'description' => 'It depends on the situation',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/it-depends.mp3'),
                ],
                [
                    'text' => 'I agree with you',
                    'emoji' => '✅',
                    'description' => 'I am agree with you',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-agree-with-you.mp3'),
                ],
                [
                    'text' => 'The reason is / Because',
                    'emoji' => '🎯',
                    'description' => 'The reason is because',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/the-reason-is-because.mp3'),
                ],
                [
                    'text' => 'In my opinion / Personally',
                    'emoji' => '🗣️',
                    'description' => 'According to my opinion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/in-my-opinion-personally.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])