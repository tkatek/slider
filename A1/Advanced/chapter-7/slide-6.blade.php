<?php
$content = [
    'page_title' => 'What is this sign called?',
    'title'      => 'What is this sign called?',
    'subtitle'   => 'Let’s watch this video!',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Advanced/chapter-7/video/signs-shorts-encrypted/signs-shorts.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Advanced/chapter-7/img/short.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 2,  'text' => 'What is this sign called?'],
                ['start' => 2.7,  'end' => 4,  'text' => 'Stop sign.'],
                ['start' => 4,  'end' => 6.5, 'text' => 'What is this sign called?'],
                ['start' => 7, 'end' => 9, 'text' => 'No entry.'],
                ['start' => 9.5, 'end' => 11, 'text' => 'What is this sign called?'],
                ['start' => 12, 'end' => 14, 'text' => 'Warning.'],
                ['start' => 14, 'end' => 16.5, 'text' => 'What is this sign called?'],
                ['start' => 17, 'end' => 18.5, 'text' => 'One way.'],
                ['start' => 19, 'end' => 21, 'text' => 'What is this sign called?'],
                ['start' => 21, 'end' => 22.5, 'text' => "It's fragile."],
                ['start' => 23, 'end' => 25.5, 'text' => 'What is this sign called?'],
                ['start' => 25.5, 'end' => 27, 'text' => 'Parking.'],
                ['start' => 28, 'end' => 29.2, 'text' => 'What is this sign called?'],
                ['start' => 30.5, 'end' => 32, 'text' => 'No parking.'],
                ['start' => 32, 'end' => 34, 'text' => 'What is this sign called?'],
                ['start' => 35.2, 'end' => 36.5, 'text' => 'Recycle.'],
                ['start' => 36.5, 'end' => 38.5, 'text' => 'What is this sign called?'],
                ['start' => 39.5, 'end' => 40.5, 'text' => 'Danger.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])