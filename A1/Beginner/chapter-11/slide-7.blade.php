<?php
$content = [
    'page_title' => 'Let’s find out!',
    'title'      => 'Let’s find out!',
    'subtitle'   => '',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Beginner/chapter-11/video/room-names-encrypted/room-names.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-11/video/room-names.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => 'Study room'],
                ['start' => 4,  'end' => 7,  'text' => 'Living room'],
                ['start' => 8,  'end' => 10,  'text' => 'Bedroom'],
                ['start' => 12,  'end' => 15,  'text' => 'Dining room'],
                ['start' => 16,  'end' => 18, 'text' => 'Kitchen'],
                ['start' => 20, 'end' => 23, 'text' => 'Play room'],
                ['start' => 24, 'end' => 27, 'text' => 'Home theatre'],
                ['start' => 28, 'end' => 31, 'text' => 'Rest room'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])