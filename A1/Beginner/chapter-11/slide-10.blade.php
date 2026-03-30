<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A1/Beginner/chapter-11/img/slide10.webp'),
    'image_alt'  => 'home repair adjectives',
    'image_fit'  => 'contain',

    'items' => [
        [
            'emoji' => '🪟',
            'text'  => 'The window is <span style="color:#f97316;">broken</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-window-is-broken.mp3"),
        ],
        [
            'emoji' => '🧱',
            'text'  => 'The wall is <span style="color:#f97316;">cracked</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-wall-is-cracked.mp3"),
        ],
        [
            'emoji' => '🚰',
            'text'  => 'The sink drain is <span style="color:#f97316;">clogged</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-sink-drain-is-clogged.mp3"),
        ],
        [
            'emoji' => '🕸️',
            'text'  => 'The window screen is <span style="color:#f97316;">torn</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-window-screen-is-torn.mp3"),
        ],
        [
            'emoji' => '⚠️',
            'text'  => 'The walkway is <span style="color:#f97316;">slippery</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-walkway-is-slippery.mp3"),
        ],
        [
            'emoji' => '🔊',
            'text'  => 'The air conditioner is very <span style="color:#f97316;">loud</span>',
            'sound' => materialAsset("slider/A1/Beginner/chapter-11/audios/slide10/The-air-conditioner-is-very-loud.mp3"),
        ],
    ],
];
?>
@include("slider.other.new-language-emoji", ['content' => $content])