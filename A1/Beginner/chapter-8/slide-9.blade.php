<?php

$content = [
    'page_title' => 'Taxi Vocabulary',
    'title'      => 'Taxi Vocabulary',
    'subtitle'   => 'Tap the play button, listen, then repeat.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 ',

    'items' => [
        [
            'text'  => 'Driver',
            'emoji' => '🚖',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/driver.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/driver.webp'),
        ],
        [
            'text'  => 'Meter',
            'emoji' => '📟',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/meter.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/meter.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
