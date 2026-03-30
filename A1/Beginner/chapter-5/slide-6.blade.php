<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Types of Houses',

    // ✅ control columns here
    'grid' => [
        'base' => 2, // mobile
        'sm'   => 3, // tablet
        'lg'   => 4, // large screens (desktop)
        'xl'   => 4,
        'max'  => 340,
        'gap'  => 14,
    ],

    'items'      => [
        [
            'text'  => '🏠 House',
            'sound' => materialAsset("slider/A1/Beginner/chapter-5/audios/slide6/house.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/house.webp'),
        ],
        [
            'text'  => '🏢 Apartment building',
            'sound' => materialAsset("slider/A1/Beginner/chapter-5/audios/slide6/apartment-building.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/apartment-building.webp'),
        ],
        [
            'text'  => '🚐 Mobile home',
            'sound' => materialAsset("slider/A1/Beginner/chapter-5/audios/slide6/mobile-home.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/mobile-home.webp'),
        ],
        [
            'text'  => '🏘️ Townhouse',
            'sound' => materialAsset("slider/A1/Beginner/chapter-5/audios/slide6/town-house.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/townhouse.webp'),

        ],
    ],
];
?>


@include("slider.vocab.image-box",['content'=>$content])
