<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'text'     => 'Communication',
            'subtitle' => 'Sending and receiving messages',
            'emoji'    => '💬',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/communication.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/communication.webp'),
        ],
        [
            'text'     => 'Postal system',
            'subtitle' => 'A service for sending letters and parcels',
            'emoji'    => '📮',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/postal-system.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/postal-system.webp'),
        ],
        [
            'text'     => 'Parcel',
            'subtitle' => 'A package you send or receive',
            'emoji'    => '📦',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/parcel.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/parcel.webp'),
        ],
        [
            'text'     => 'Mass communication',
            'subtitle' => 'Sending information to many people',
            'emoji'    => '📺',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/mass-communication.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/mass-communication.webp'),
        ],
        [
            'text'     => 'Satellite',
            'subtitle' => 'A machine in space that sends signals',
            'emoji'    => '🛰️',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/satellite.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/satellite.webp'),
        ],
        [
            'text'     => 'Signal',
            'subtitle' => 'Information sent electronically',
            'emoji'    => '📶',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/signal.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/signal.webp'),
        ],
        [
            'text'     => 'Internet',
            'subtitle' => 'A global system to send information and communicate',
            'emoji'    => '🌐',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/internet.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/internet.webp'),
        ],
        [
            'text'     => 'Email',
            'subtitle' => 'An electronic message sent using the internet',
            'emoji'    => '📧',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/email.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/email.webp'),
        ],
        [
            'text'     => 'Smartphone',
            'subtitle' => 'A mobile phone that can use apps and the internet',
            'emoji'    => '📱',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/smartphone.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/smartphone.webp'),
        ],
        [
            'text'     => 'Instant message',
            'subtitle' => 'A message sent quickly online',
            'emoji'    => '⚡',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/instant-message.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/instant-message.webp'),
        ],
        [
            'text'     => 'Device',
            'subtitle' => 'A piece of equipment like a phone or computer',
            'emoji'    => '💻',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/device.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/device.webp'),
        ],
        [
            'text'     => 'Connect',
            'subtitle' => 'To communicate or link with others',
            'emoji'    => '🔗',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide7/connect.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide7/connect.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
