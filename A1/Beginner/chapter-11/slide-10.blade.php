<?php

$content = [

    'title'      => 'New Language',
    'subtitle'   => 'Notice the following adjectives',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',


    'items' => [
        [
            'emoji' => '🪟',
            'text'  => 'The window is <span class="text-orange-500 font-black">broken</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/broken.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-window-is-broken.mp3'),
        ],
        [
            'emoji' => '🧱',
            'text'  => 'The wall is <span class="text-orange-500 font-black">cracked</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/cracked.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-wall-is-cracked.mp3'),
        ],
        [
            'emoji' => '🚰',
            'text'  => 'The sink drain is <span class="text-orange-500 font-black">clogged</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/clogged.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-sink-drain-is-clogged.mp3'),
        ],
        [
            'emoji' => '🕸️',
            'text'  => 'The window screen is <span class="text-orange-500 font-black">torn</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/torn.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-window-screen-is-torn.mp3'),
        ],
        [
            'emoji' => '⚠️',
            'text'  => 'The walkway is <span class="text-orange-500 font-black">slippery</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/slippery.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-walkway-is-slippery.mp3'),
        ],
        [
            'emoji' => '🔊',
            'text'  => 'The air conditioner is very <span class="text-orange-500 font-black">loud</span>',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/loud.webp'),
            'sound' => materialAsset('slider/A1/Beginner/chapter-11/audios/slide10/The-air-conditioner-is-very-loud.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])