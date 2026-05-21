<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Role-play the dialogue with the same gadgets discussed in slide 13',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Anna',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/mia.webp'),
        ],
        'right' => [
            'name'  => 'Jack',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/tom.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'What do you use your laptop to do?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-3/audios/slide15/1.mp3'),
        ],
        [
            'text'   => 'I use my laptop to work in class.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-3/audios/slide15/2.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])