<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Key Vocabulary at the Bus Station',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text'     => 'One-way ticket',
            'subtitle' => 'A ticket for only one direction',
            'emoji'    => '🎫',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/1.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/1.webp'),
        ],

        [
            'text'     => 'Return ticket',
            'subtitle' => 'A ticket for going and coming back',
            'emoji'    => '🎟️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/2.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/2.webp'),
        ],

        [
            'text'     => 'The next bus leaves at...',
            'subtitle' => 'The next departure time',
            'emoji'    => '🕒',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/3.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/3.webp'),
        ],

        [
            'text'     => 'How long is the trip?',
            'subtitle' => 'How many hours or minutes it takes',
            'emoji'    => '⏳',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/4.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/4.webp'),
        ],

        [
            'text'     => 'It takes about...',
            'subtitle' => 'The duration of the trip',
            'emoji'    => '⌛',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/5.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/5.webp'),
        ],

        [
            'text'     => 'Ticket booth',
            'subtitle' => 'A place to purchase tickets for your bus ride',
            'emoji'    => '🏧',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/6.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/6.webp'),
        ],

        [
            'text'     => 'Platform',
            'subtitle' => 'The area where buses stop for boarding and getting off',
            'emoji'    => '🚌',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/7.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/7.webp'),
        ],

        [
            'text'     => 'Bus route number',
            'subtitle' => 'The unique number that identifies each bus line',
            'emoji'    => '🔢',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/8.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-5/img/slide10/8.webp'),
        ],

        [
            'text'     => 'Bus stop',
            'subtitle' => 'A designated place where buses pick up passengers',
            'emoji'    => '🚏',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-5/audios/slide10/9.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/bus-stop.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])