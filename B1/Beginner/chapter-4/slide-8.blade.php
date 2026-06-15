<?php
$content = [
    'title'      => 'New Language Expressions',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [

        [
            'text' => 'make us laugh',
            'subtitle' => 'cause people to laugh',
            'emoji' => '😂',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/make-us-laugh.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/make-us-laugh.webp'),
        ],

        [
            'text' => 'make us cry',
            'subtitle' => 'cause sadness',
            'emoji' => '😢',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/make-us-cry.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/make-us-cry.webp'),
        ],

        [
            'text' => 'jump in our seats',
            'subtitle' => 'react with fear or surprise',
            'emoji' => '😱',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/jump-in-our-seats.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/jump-in-our-seats.webp'),
        ],

        [
            'text' => 'tell stories from the past',
            'subtitle' => 'describe historical events',
            'emoji' => '🏛️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/tell-stories-from-the-past.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/tell-stories-from-the-past.webp'),
        ],

        [
            'text' => 'watch a trailer',
            'subtitle' => 'see a short preview',
            'emoji' => '🎞️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/watch-a-trailer.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/watch-a-trailer.webp'),
        ],

        [
            'text' => 'play a role',
            'subtitle' => 'act as a character',
            'emoji' => '🎭',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/play-a-role.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/play-a-role.webp'),
        ],

        [
            'text' => 'be involved in',
            'subtitle' => 'take part in something',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/be-involved-in.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/be-involved-in.webp'),
        ],

        [
            'text' => 'special appearance',
            'subtitle' => 'short appearance by a famous actor',
            'emoji' => '🌟',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide8/special-appearance.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide8/special-appearance.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])