<?php

$content = [
    'page_title' => 'Bus Vocabulary',
    'title'      => 'Bus Vocabulary',
    'subtitle'   => 'Tap the play button, listen, then repeat.',

    'grid' => [
        'base' => 1,
        'sm'   => 1,
        'lg'   => 3,
        'xl'   => 3,
        'min'  => 150,
        'max'  => 340,
        'gap'  => 14,
    ],

    'items' => [
        [
            'text'  => '🚌 Bus Stop',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/bus-stop.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/bus-stop.webp'),
        ],
        [
            'text'  => '🧑‍✈️ Bus Driver',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/bus-driver.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/bus-driver.webp'),
        ],
        [
            'text'  => '👥 Passengers',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/passengers.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/passengers.webp'),
        ],
    ],
];

?>

@include("slider.vocab.image-box",['content'=>$content])
