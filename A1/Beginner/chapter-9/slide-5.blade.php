<?php

$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => 'Food Categories at the Supermarket',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'text'  => 'Poultry',
            'emoji' => '🍗',
            'sound' => materialAsset('slider/A1/Beginner/chapter-9/audios/slide5/poultry.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/poultry.webp'),
        ],
        [
            'text'  => 'Meat',
            'emoji' => '🥩',
            'sound' => materialAsset('slider/A1/Beginner/chapter-9/audios/slide5/meat.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/meat.webp'),
        ],
        [
            'text'  => 'The Produce Department',
            'emoji' => '🥕',
            'sound' => materialAsset('slider/A1/Beginner/chapter-9/audios/slide5/produce-dep.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/produce-department.webp'),
        ],
        [
            'text'  => 'The Bakery',
            'emoji' => '🥖',
            'sound' => materialAsset('slider/A1/Beginner/chapter-9/audios/slide5/the-bakery.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/bakery.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
