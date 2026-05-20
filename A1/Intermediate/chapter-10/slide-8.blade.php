<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [

        [
            'text'     => 'Your bag is within the weight limit.',
            'subtitle' => '',
            'emoji'    => '⚖️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/your-bag-is.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/1.webp'),
        ],

        [
            'text'     => "I'd like to check in for my flight.",
            'subtitle' => '',
            'emoji'    => '🛂',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/like-to-check.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/2.webp'),
        ],

        [
            'text'     => 'Can I see your passport and ticket, please?',
            'subtitle' => '',
            'emoji'    => '🪪',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/can-i-see.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/3.webp'),
        ],

        [
            'text'     => 'Are you checking in any luggage?',
            'subtitle' => '',
            'emoji'    => '🧳',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/are-you-checking.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/4.webp'),
        ],

        [
            'text'     => 'Please put it on the scale.',
            'subtitle' => '',
            'emoji'    => '⚖️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/please-put-it.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/5.webp'),
        ],

        [
            'text'     => 'Can I have a window seat, please?',
            'subtitle' => '',
            'emoji'    => '🪟',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/can-i-have.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/6.webp'),
        ],

        [
            'text'     => 'What time does boarding start?',
            'subtitle' => '',
            'emoji'    => '⏰',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/what-time-does.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/7.webp'),
        ],

        [
            'text'     => 'Thanks for your help.',
            'subtitle' => '',
            'emoji'    => '🙏',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide8/thanks-for-your.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide8/8.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])