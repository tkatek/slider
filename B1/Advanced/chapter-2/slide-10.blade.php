<?php
$content = [

    'title'      => 'Let’s watch this:',
    'subtitle'   => '',
    'shorts'     => [
        [
            'src' => materialAsset(''),
            'thumbnail' => materialAsset(''),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,   'end' => 2,  ''],

            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])