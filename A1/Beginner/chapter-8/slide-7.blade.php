<?php

$content = [
    'page_title' => 'Bus Vocabulary',
    'title'      => 'Bus Vocabulary',
    'subtitle'   => 'Tap the play button, listen, then repeat.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 ',

    'items' => [
        [
            'text'  => 'Bus Stop',
            'emoji' => '🚌',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/bus-stop.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/bus-stop.webp'),
        ],
        [
            'text'  => 'Bus Driver',
            'emoji' => '🧑‍✈️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/bus-driver.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/bus-driver.webp'),
        ],
        [
            'text'  => 'Passengers',
            'emoji' => '👥',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/passengers.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/passengers.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
