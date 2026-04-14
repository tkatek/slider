<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Beginner/chapter-2/img/slide7.webp'),

    'items'      => [
        [
            'emoji' => "\u{2728}",
            'text'  => "It's really nice.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => "\u{1F327}\u{FE0F}",
            'text'  => '<span class="text-red-500">Sometimes</span> it rain<span class="text-red-500">s</span>',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => "\u{2601}\u{FE0F}",
            'text'  => 'The sky is <span class="text-red-500">usually</span> clear and blue',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/3.mp3'),
        ],
        [
            'emoji' => "\u{1F33F}",
            'text'  => "It's my favourite season <span class=\"text-red-500\">because</span> everything feels so fresh.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/4.mp3'),
        ],
        [
            'emoji' => "\u{1F525}",
            'text'  => 'I like hot weather, <span class="text-red-500">but</span> summer is too humid.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/5.mp3'),
        ],
        [
            'emoji' => "\u{1F343}",
            'text'  => "It's <span class=\"text-red-500\">better than</span> summer because it's <span class=\"text-red-500\">cooler</span>.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/6.mp3'),
        ],
        [
            'emoji' => "\u{2744}\u{FE0F}",
            'text'  => 'It is really cold <span class="text-red-500">and</span> very dry.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/7.mp3'),
        ],
        [
            'emoji' => "\u{1F4A8}",
            'text'  => "The air is fresh and it's <span class=\"text-red-500\">often</span> quite windy.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide7/8.mp3'),
        ],
    ],
];
?>

@include('slider.other.newlanguage', ['content' => $content])
