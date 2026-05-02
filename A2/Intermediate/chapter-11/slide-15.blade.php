<?php
$content = [

    'title'      => 'Let’s watch this video',
    'subtitle'   => 'Emotions & action verbs',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Intermediate/chapter-11/'),
            'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-11/img/slide15.webp'),

            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => 'Let’s learn some useful facial expressions and action verbs!'],
                ['start' => 4,  'end' => 7,  'text' => 'I am frowning.'],
                ['start' => 7,  'end' => 10, 'text' => 'I scrunch up my nose.'],
                ['start' => 10, 'end' => 13, 'text' => 'I pout my lips.'],
                ['start' => 13, 'end' => 16, 'text' => 'I raise my eyebrows.'],
                ['start' => 16, 'end' => 19, 'text' => 'I drop my jaw.'],
                ['start' => 19, 'end' => 22, 'text' => 'I stick my tongue out.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])