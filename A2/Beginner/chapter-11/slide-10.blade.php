<?php

$content = [
    'page_title' => 'New Vocabulary 2',
    'title'      => 'New Vocabulary 2',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [
        [
            'text'  => 'swimming',
            'emoji' => '🏊',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/swimming.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/swimming.webp"),
        ],
        [
            'text'  => 'jogging',
            'emoji' => '🏃',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/jogging.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/jogging.webp"),
        ],
        [
            'text'  => 'bicycling',
            'emoji' => '🚴',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/bicycling.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/bicycling.webp"),
        ],
        [
            'text'  => 'aerobics',
            'emoji' => '🤸',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/aerobics.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/aerobics.webp"),
        ],
        [
            'text'  => 'weightlifting',
            'emoji' => '🏋️',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/weightlifting.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/weightlifting.webp"),
        ],
        [
            'text'  => 'tennis',
            'emoji' => '🎾',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/tennis.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/tennis.webp"),
        ],
        [
            'text'  => 'golf',
            'emoji' => '⛳',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide10/golf.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide10/golf.webp"),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])