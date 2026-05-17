<?php

$content = [
    'page_title' => 'Train Vocabulary',
    'title'      => 'Train Vocabulary',
    'subtitle'   => 'Tap the play button, listen, then repeat.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [
        [
            'text'  => 'Train',
            'emoji' => '🚆',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/Train.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/train.webp'),
        ],
        [
            'text'  => 'Platform',
            'emoji' => '🚉',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/platform.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/platform.webp'),
        ],
        [
            'text'  => 'Conductor',
            'emoji' => '🧑‍✈️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/Conductor.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/conductor.webp'),
        ],
        [
            'text'  => 'Ticket',
            'emoji' => '🎟️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-8/audios/ticket.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-8/img/ticket.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
