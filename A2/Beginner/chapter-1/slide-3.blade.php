<?php
$content = [

    'title'      => "What's the Weather Like today?!",
    'subtitle'   => '',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Beginner/chapter-1/video/weather-vocabulary-encrypted/weather-vocabulary.m3u8'),
            'thumbnail' => materialAsset('slider/A2/Beginner/chapter-1/slide3.webp'),

            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => 'Learn weather vocabulary.'],
                ['start' => 4,  'end' => 7,  'text' => 'Sunny.'],
                ['start' => 8,  'end' => 10, 'text' => 'Rainy.'],
                ['start' => 12, 'end' => 14, 'text' => 'Stormy.'],
                ['start' => 16, 'end' => 18, 'text' => 'Windy.'],
                ['start' => 20, 'end' => 22, 'text' => 'Cloudy.'],
                ['start' => 24, 'end' => 26, 'text' => 'Snowy.'],
                ['start' => 28, 'end' => 30, 'text' => 'Foggy.'],
                ['start' => 32, 'end' => 34, 'text' => 'Rainbow.'],
                ['start' => 36, 'end' => 38, 'text' => 'Tornado.'],
                ['start' => 40, 'end' => 42, 'text' => 'Lightning.'],
                ['start' => 44, 'end' => 46, 'text' => 'Drizzle.'],
                ['start' => 48, 'end' => 50, 'text' => 'Hail.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])
