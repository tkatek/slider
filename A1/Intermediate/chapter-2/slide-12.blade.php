<?php
$content = [
    'page_title' => 'When’s your birthday?',
    'title'      => 'When’s your birthday?',
    'subtitle'   => 'Let’s watch this',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-2/video/birthday-encrypted/birthday.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-2/video/birthday.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0, 'end' => 2,  'text' => 'When is your birthday?'],
                ['start' => 2, 'end' => 4,  'text' => "It's on july 18th"],
                ['start' => 4, 'end' => 6,  'text' => 'My birthday is on May 24th'],
                ['start' => 6, 'end' => 8,  'text' => 'Happy birthday'],

            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])