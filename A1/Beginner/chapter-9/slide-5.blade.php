<?php

$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => 'Food Categories at the Supermarket',

    'grid' => [
        'base' => 2,
        'sm'   => 3,
        'lg'   => 4,
        'min'  => 150,
        'max'  => 340,
        'gap'  => 14,
    ],

    'items' => [
        [
            'text'  => '🍗 Poultry',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide5/poultry.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/poultry.webp'),
        ],
        [
            'text'  => '🥩 Meat',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide5/meat.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/meat.webp'),
        ],
        [
            'text'  => '🥕 The Produce Department',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide5/produce-dep.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/produce-department.webp'),
        ],
        [
            'text'  => '🥖 The Bakery',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide5/the-bakery.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/bakery.webp'),
        ],
    ],
];

?>

@include("slider.vocab.image-box", ['content' => $content])