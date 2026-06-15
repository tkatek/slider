<?php
$content = [

    'title'      => 'Let’s watch this video',
    'subtitle'   => 'Emotions & action verbs',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Intermediate/chapter-11/video/short-encrypted/short.m3u8'),
            'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-11/img/slide15.webp'),

            'subtitles' => [
                ['start' => 0,  'end' => 5,  'text' => 'Let’s learn some useful facial expressions and action verbs!'],
                ['start' => 6,  'end' => 8,  'text' => 'I am frowning.'],
                ['start' => 9,  'end' => 11, 'text' => 'I scrunch up my nose.'],
                ['start' => 12.5, 'end' => 14.5, 'text' => 'I pout my lips.'],
                ['start' => 16, 'end' => 18, 'text' => 'I raise my eyebrows.'],
                ['start' => 19.5, 'end' => 21.5, 'text' => 'I drop my jaw.'],
                ['start' => 23, 'end' => 25, 'text' => 'I stick my tongue out.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])