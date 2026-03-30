<?php
$content = [
    'page_title' => 'Let’s watch  this video:',
    'title'      => 'Most famous Festivals around the world',
    'subtitle'   => 'Let’s watch  this video:',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-2/video/festivals-encrypted/festivals.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-2/video/thumbnail-celebrations.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => 'Most famous Festivals around the world'],
                ['start' => 4,  'end' => 6,  'text' => 'Bodhi day'],
                ['start' => 6,  'end' => 9,  'text' => 'Halloween'],
                ['start' => 9,  'end' => 12, 'text' => 'Diwali'],
                ['start' => 12, 'end' => 15, 'text' => "Valentine's day"],
                ['start' => 15, 'end' => 18, 'text' => 'Easter'],
                ['start' => 18, 'end' => 21, 'text' => 'Eid al fitr'],
                ['start' => 22, 'end' => 24, 'text' => 'Chinese new year'],
                ['start' => 26, 'end' => 28, 'text' => 'New year'],
                ['start' => 28, 'end' => 31, 'text' => 'Christmas'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])