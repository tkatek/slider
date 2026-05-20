<?php

$content = [
    'title'      => 'Furniture Vocabulary',
    'subtitle'   => '',
    'image_text_style' => 'overlay',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'text'  => 'Bed',
            'emoji' => '🛏️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/bed.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/bed.webp'),
        ],
        [
            'text'  => 'Bedside table',
            'emoji' => '🛏️🗄️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/bedside-table.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/bedside-table.webp'),
        ],
        [
            'text'  => 'Lamp',
            'emoji' => '💡',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/lamp.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/lamp.webp'),
        ],
        [
            'text'  => 'Bathtub',
            'emoji' => '🛁',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/bathtub.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/bathtub.webp'),
        ],
        [
            'text'  => 'Shower',
            'emoji' => '🚿',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/shower.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/shower.webp'),
        ],
        [
            'text'  => 'Sink',
            'emoji' => '🚰',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/sink.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/sink.webp'),
        ],
        [
            'text'  => 'Toilet',
            'emoji' => '🚽',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/toilet.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/toilet.webp'),
        ],
        [
            'text'  => 'Fridge',
            'emoji' => '🧊',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/fridge.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/fridge.webp'),
        ],
        [
            'text'  => 'Microwave',
            'emoji' => '📡',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/microwave.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/microwave.webp'),
        ],
        [
            'text'  => 'Oven',
            'emoji' => '🔥',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/oven.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/oven.webp'),
        ],
        [
            'text'  => 'Chair',
            'emoji' => '🪑',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/chair.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/chair.webp'),
        ],
        [
            'text'  => 'Sofa',
            'emoji' => '🛋️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/sofa.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/sofa.webp'),
        ],
        [
            'text'  => 'Coffee table',
            'emoji' => '🪑☕',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/coffee-table.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/coffee-table.webp'),
        ],
        [
            'text'  => 'Carpet',
            'emoji' => '🧶',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/carpet.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/carpet.webp'),
        ],
        [
            'text'  => 'TV',
            'emoji' => '📺',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/tv.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/tv.webp'),
        ],
        [
            'text'  => 'TV unit',
            'emoji' => '📺🗄️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/tv-unit.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/tv-unit.webp'),
        ],
        [
            'text'  => 'Table',
            'emoji' => '🪑🍽️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide8/table.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-5/img/slide8/table.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])