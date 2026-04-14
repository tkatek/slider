<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Beginner/chapter-2/img/slide9.webp'),

    'items'      => [
        [
            'emoji' => "\u{1F975}",
            'text'  => '<span class="text-red-500">Sweaty</span> / <span class="text-red-500">Uncomfortable</span><br>I don\'t like being hot and sweaty and uncomfortable',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide9/sweaty.mp3'),
        ],
        [
            'emoji' => "\u{1F3D5}\u{FE0F}",
            'text'  => '<span class="text-red-500">Go away</span><br>When it\'s hot, we usually go away on the weekends to relax.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide9/go-away.mp3'),
        ],
        [
            'emoji' => "\u{1F4AC}",
            'text'  => '<span class="text-red-500">By the way</span><br>Where are you from, by the way?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide9/by-the-way.mp3'),
        ],
        [
            'emoji' => "\u{1F3C2}",
            'text'  => '<span class="text-red-500">Snowboarding</span><br>I go snowboarding in the winter.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide9/snowboarding.mp3'),
        ],
        [
            'emoji' => "\u{1F6B6}",
            'text'  => '<span class="text-red-500">Walk around</span><br>I walk around and enjoy the cold weather.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide9/walk-around.mp3'),
        ],
    ],
];
?>

@include('slider.other.newlanguage', ['content' => $content])
