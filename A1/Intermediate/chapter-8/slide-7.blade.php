<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'items_left' => [
        [
            'emoji'  => '🧳',
            'text'   => "I'd like to <red>book a holiday package</red>.",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/1.mp3'),
        ],
        [
            'emoji'  => '✈️',
            'text'   => "I'm thinking about <red>Italy</red>.",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/2.mp3'),
        ],
        [
            'emoji'  => '🏙️',
            'text'   => "I prefer <red>a city tour</red>.",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/3.mp3'),
        ],
        [
            'emoji'  => '📅',
            'text'   => "When is it available?",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/4.mp3'),
        ],
        [
            'emoji'  => '💳',
            'text'   => "How much does it <red>cost</red>?",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/5.mp3'),
        ],
        [
            'emoji'  => '🍳',
            'text'   => "Does it <red>include</red> breakfast?",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/6.mp3'),
        ],
    ],

    'items_right' => [
        [
            'emoji'  => '🥐',
            'text'   => "Breakfast <red>is included</red> every day.",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/7.mp3'),
        ],
        [
            'emoji'  => '💺',
            'text'   => "I'd like book one <red>seat</red>.",
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/8.mp3'),
        ],
        [
            'emoji'  => '✅',
            'text'   => "<red>Payment confirmed</red>.",
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide7/9.mp3"),
        ],
        [
            'emoji'  => '📄',
            'text'   => "<red>Here are</red> your travel documents.",
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide7/10.mp3"),
        ],
        [
            'emoji'  => '🤝',
            'text'   => "Thank you for your help / My pleasure.",
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide7/11.mp3"),
        ],
        [
            'emoji'  => '✈️',
            'text'   => "Have a great trip to <red>Italy</red>.",
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide7/12.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.sentence-audio-emoji", ['content' => $content])