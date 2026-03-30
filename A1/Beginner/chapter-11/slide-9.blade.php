<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    // --- Image Settings ---
    'show_footer_image' => 1, // Set to 1 to show, 0 to hide
    'footer_image'      => materialAsset('slider/A1/Beginner/chapter-11/img/slide-9.webp'),

    'people' => [
        'left'  => [
            'name'  => 'Tenant',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/tenant.webp'),
        ],
        'right' => [
            'name'  => 'Landlord',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/landlord.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "There’s something wrong with the sink.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-11/audios/slide9/1.mp3"),
        ],
        [
            'text'   => "Which sink?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-11/audios/slide9/2.mp3"),
        ],
        [
            'text'   => "The bathroom sink. It’s full of water.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-11/audios/slide9/3.mp3"),
        ],
        [
            'text'   => "Oh, it’s clogged. I’ll call the plumber. Don’t use it for a while.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-11/audios/slide9/4.mp3"),
        ],
        [
            'text'   => "OK.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-11/audios/slide9/5.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])