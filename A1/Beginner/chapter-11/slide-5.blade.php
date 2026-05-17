<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-5',

    'items' => [
        [
            'text'  => 'Camper van',
            'emoji' => '🚐',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Camper-van.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Camper-van.webp'),
        ],
        [
            'text'  => 'Detached house',
            'emoji' => '🏡',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Detached-house.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Detached-house.webp'),
        ],
        [
            'text'  => 'Semi-detached House',
            'emoji' => '🏘️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Semi-detached-house.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Semi-detached-house.webp'),
        ],
        [
            'text'  => 'Lighthouse',
            'emoji' => '🏠',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Lighthouse.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Lighthouse.webp'),
        ],
        [
            'text'  => 'Cottage',
            'emoji' => '🛖',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Cottage.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Cottage.webp'),
        ],
        [
            'text'  => 'Villa',
            'emoji' => '🏛️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Villa.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Villa.webp'),
        ],
        [
            'text'  => 'A block of flats',
            'emoji' => '🏢',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/A-block-of-flats.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Block-of-flats.webp'),
        ],
        [
            'text'  => 'Terraced Houses',
            'emoji' => '🏘️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Terraced-houses.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Terraced-houses.webp'),
        ],
        [
            'text'  => 'Skyscraper',
            'emoji' => '🏙️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide5/Skyscraper.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide5/Skyscraper.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])