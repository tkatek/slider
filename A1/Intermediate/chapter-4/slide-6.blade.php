<?php
$content = [
    'page_title' => 'What’s the matter ?',
    'title'      => 'What’s the matter ?',
    'subtitle'   => 'Let’s watch this video',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-4/videos/what-the-matter-encrypted/what-the-matter.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-4/videos/short1.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 2,  'text' => "What's the matter?"],
                ['start' => 2,  'end' => 4,  'text' => 'I have a fever.'],
                ['start' => 6,  'end' => 8,  'text' => "What's the matter?"],
                ['start' => 8,  'end' => 10,  'text' => 'I have a cold.'],
                ['start' => 12,  'end' => 13, 'text' => "What's the matter?"],
                ['start' => 13.5, 'end' => 15, 'text' => 'I have a cough.'],
                ['start' => 17, 'end' => 19, 'text' => "What's the matter?"],
                ['start' => 19.5, 'end' => 21, 'text' => 'I have a headache.'],
                ['start' => 22.5, 'end' => 24, 'text' => "What's the matter?"],
                ['start' => 25, 'end' => 27, 'text' => 'I have the flu.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])