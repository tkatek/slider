<?php
$content = [
    'page_title' => 'role-play activity',
    'title'      => 'Role-play activity',
    'subtitle'   => '',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Mia',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/mia.webp'),
        ],
        'right' => [
            'name'  => 'Tom',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/tom.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Hi, Tom! Do you like basketball?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/mia1.mp3"),
        ],
        [
            'text'   => "Yes, I love it! I always watch the games on TV.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/tom1.mp3"),
        ],
        [
            'text'   => "Me too! Do you want to go to a match this Saturday?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/mia2.mp3"),
        ],
        [
            'text'   => "Yes, I'd love to! What time?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/tom2.mp3"),
        ],
        [
            'text'   => "The game starts at 7 p.m. Let's meet at 6.30.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/mia3.mp3"),
        ],
        [
            'text'   => "Perfect! See you then.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-1/audio/slide-10/tom3.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])