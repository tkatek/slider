<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Beginner/chapter-1/cover.webp'),

    'items'      => [
        [
            'emoji' => "\u{1F326}\u{FE0F}", 
            'text'  => 'How is the weather?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/1.mp3'),
        ],
        [
            'emoji' => "\u{2600}\u{FE0F}",
            'text'  => "It\u{2019}s hot and sunny.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/7.mp3'),
        ],
        [
            'emoji' => "\u{1F4A8}",
            'text'  => "It\u{2019}s windy and cold.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/3.mp3'),
        ],
        [
            'emoji' => "\u{1F327}\u{FE0F}",
            'text'  => "It\u{2019}s cold and raining.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/4.mp3'),
        ],
        [
            'emoji' => "\u{2744}\u{FE0F}",
            'text'  => 'Is it cold in winter?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/5.mp3'),
        ],
        [
            'emoji' => "\u{2705}",
            'text'  => 'Yes, it is.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/6.mp3'),
        ],
        [
            'emoji' => "\u{1F525}",
            'text'  => 'Is it hot in winter?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/2.mp3'),
        ],
        [
            'emoji' => "\u{274C}",
            'text'  => "No, it isn\u{2019}t.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide10/8.mp3'),
        ],
    ],
];
?>
@include('slider.other.newlanguage', ['content' => $content])