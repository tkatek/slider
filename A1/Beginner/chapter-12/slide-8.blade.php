<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A1/Beginner/chapter-12/img/slide8.webp'),
    'image_alt'  => 'bank account and payment vocabulary',
    'image_fit'  => 'contain', // use 'cover' if you want it cropped to fill more


    'items' => [
        [
            'emoji' => '💵',
            'text'  => 'Your total is...',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter8/Your-total-is.mp3'),
        ],
        [
            'emoji' => '💳',
            'text'  => 'Pay by card/cash/check',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter8/Pay-by-card.mp3'),
        ],
        [
            'emoji' => '🏧',
            'text'  => 'Insert your card',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter8/Insert-your-card.mp3'),
        ],
        [
            'emoji' => '🧾',
            'text'  => 'Here’s your receipt',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter8/Your-receipt.mp3'),
        ],
        [
            'emoji' => '🏦',
            'text'  => 'I would like to open a bank account',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter8/I-would-like.mp3'),
        ],
    ],
];
?>
@include("slider.other.new-language-emoji", ['content' => $content])