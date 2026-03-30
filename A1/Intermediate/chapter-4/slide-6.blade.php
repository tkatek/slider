<?php
$content = [
    'page_title' => 'What’s the matter ?',
    'title'      => 'What’s the matter ?',
    'subtitle'   => 'Let’s watch this video',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-4/videos/short1.mp4'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-4/videos/short1.webp'),
            'showCC' => false,
            'subtitles' => [


            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])