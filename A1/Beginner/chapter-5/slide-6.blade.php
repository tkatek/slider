<?php

$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => 'Types of Houses',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [
        [
            'text'  => 'House',
            'emoji' => '🏠',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide6/house.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/house.webp'),
        ],
        [
            'text'  => 'Apartment building',
            'emoji' => '🏢',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide6/apartment-building.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/apartment-building.webp'),
        ],
        [
            'text'  => 'Mobile home',
            'emoji' => '🚐',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide6/mobile-home.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/mobile-home.webp'),
        ],
        [
            'text'  => 'Townhouse',
            'emoji' => '🏘️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide6/town-house.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide6/townhouse.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
