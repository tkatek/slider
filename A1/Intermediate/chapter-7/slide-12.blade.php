<?php
$content = [

    'title'      => 'Travel Activities',
    'subtitle'   => 'What can you do when you go on holiday?',

    'image_text_style' => 'overlay',
    'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',

    'items' => [

        ['text' => 'Go shopping', 'emoji' => '🛍️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/go-shopping.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-shopping.webp')],

        ['text' => 'Take photos', 'emoji' => '📸',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/take-photos.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/take-photos.webp')],

        ['text' => 'Go sightseeing', 'emoji' => '🏛️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/go-sightseeing.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-sightseeing.webp')],

        ['text' => 'Buy souvenirs', 'emoji' => '🎁',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/buy-souvenirs.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/buy-souvenirs.webp')],

        ['text' => 'Go swimming', 'emoji' => '🏊',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/go-swimming.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-swimming.webp')],

        ['text' => 'Sunbathe on the beach', 'emoji' => '☀️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/sunbathe-on-the-beach.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/sunbathe-on-the-beach.webp')],

        ['text' => 'Build a sandcastle', 'emoji' => '🏖️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/build-a-sandcastle.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/build-a-sandcastle.webp')],

        ['text' => 'Walk by the sea', 'emoji' => '🌊',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/walk-by-the-sea.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/walk-by-the-sea.webp')],

        ['text' => 'Have a picnic', 'emoji' => '🧺',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/have-a-picnic.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/have-a-picnic.webp')],

        ['text' => 'Write postcards', 'emoji' => '✉️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide12/write-postcards.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/write-postcards.webp')],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])