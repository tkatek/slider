<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Tracking Number',
            'subtitle'         => 'Unique code to track a package',
            'example_subtitle' => 'Can I have your tracking number?',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-1/audios/slide4/tracking-number.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-1/img/slide4/tracking-number.webp'),
        ],
        [
            'text'             => 'Express Delivery',
            'subtitle'         => 'Faster shipping option',
            'example_subtitle' => 'Express delivery costs more.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-1/audios/slide4/express-delivery.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-1/img/slide4/express-delivery.webp'),
        ],
        [
            'text'             => 'Standard Shipping',
            'subtitle'         => 'Regular delivery option',
            'example_subtitle' => 'Standard shipping is cheaper.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-1/audios/slide4/standard-shipping.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-1/img/slide4/standard-shipping.webp'),
        ],
        [
            'text'             => 'Customs',
            'subtitle'         => 'Border inspection for packages',
            'example_subtitle' => 'Customs delayed my package.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-1/audios/slide4/customs.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-1/img/slide4/customs.webp'),
        ],
        [
            'text'             => 'Postage',
            'subtitle'         => 'Cost of sending a package',
            'example_subtitle' => 'How much is the postage?',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-1/audios/slide4/postage.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-1/img/slide4/postage.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])