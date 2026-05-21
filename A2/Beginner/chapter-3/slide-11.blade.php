<?php

$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => 'Weather Expressions',

    'groups' => [
        [
            'key' => 'weather-expressions',
            'title' => 'Can you describe the weather in your area today?',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',
            'items' => [
                [
                    'emoji' => '⛅',
                    'text'  => 'partly cloudy',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/partly-cloudy.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/partly-cloudy.mp3'),
                ],
                [
                    'emoji' => '🌦️',
                    'text'  => 'light rain',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/light-rain.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/light-rain.mp3'),
                ],
                [
                    'emoji' => '❄️',
                    'text'  => 'heavy snow falling',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/heavy-snow-falling.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/heavy-snow-falling.mp3'),
                ],
                [
                    'emoji' => '💨',
                    'text'  => 'strong winds blowing',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/strong-winds-blowing.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/strong-winds-blowing.mp3'),
                ],
                [
                    'emoji' => '🧣',
                    'text'  => 'bundle up!',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/bundle-up.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/bundle-up.mp3'),
                ],
                [
                    'emoji' => '🌤️',
                    'text'  => 'mild and pleasant',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/mild-and-pleasant.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/mild-and-pleasant.mp3'),
                ],
                [
                    'emoji' => '🌫️',
                    'text'  => 'Thick fog',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/thick-fog.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/thick-fog.mp3'),
                ],
                [
                    'emoji' => '💧',
                    'text'  => 'Humid and sticky',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/humid-and-sticky.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/humid-and-sticky.mp3'),
                ],
                [
                    'emoji' => '⛈️',
                    'text'  => 'A thunderstorm approaching',
                    'image' => materialAsset('slider/A2/Beginner/chapter-3/img/slide11/a-thunderstorm-approaching.webp'),
                    'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/a-thunderstorm-approaching.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])