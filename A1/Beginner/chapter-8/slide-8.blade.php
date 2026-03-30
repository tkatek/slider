<?php

$content = [
    'page_title' => 'Train Vocabulary',
    'title'      => 'Train Vocabulary',
    'subtitle'   => 'Tap the play button, listen, then repeat.',

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
            'text'  => '🚆 Train',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/Train.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/train.webp'),
        ],
        [
            'text'  => '🚉 Platform',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/platform.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/platform.webp'),
        ],
        [
            'text'  => '🧑‍✈️ Conductor',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/Conductor.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/conductor.webp'),
        ],
        [
            'text'  => '🎟️ Ticket',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/ticket.mpeg"),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/ticket.webp'),
        ],
    ],
];

?>

@include("slider.vocab.image-box",['content'=>$content])
