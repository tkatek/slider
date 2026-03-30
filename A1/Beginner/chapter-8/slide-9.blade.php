<?php

$content = [
    'page_title' => 'Taxi Vocabulary',
    'title'      => 'Taxi Vocabulary',
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
            'text'  => '🚖 Driver',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/driver.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/driver.webp'),
        ],
        [
            'text'  => '📟 Meter',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/meter.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/meter.webp'),
        ],
    ],
];

?>

@include("slider.vocab.image-box",['content'=>$content])
