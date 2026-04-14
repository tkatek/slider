<?php
$content = [

    'title'      => "What's the Weather Like today?!",
    'subtitle'   => '',
    'shorts'     => [
        [
            'src' => materialAsset(''),
            'thumbnail' => materialAsset(''),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => 'This is a refrigerator.'],
                ['start' => 4,  'end' => 9,  'text' => 'a microwave.'],
                ['start' => 9,  'end' => 14, 'text' => 'a stove.'],
                ['start' => 14, 'end' => 18, 'text' => 'an oven.'],
                ['start' => 18, 'end' => 22, 'text' => 'a rice cooker.'],
                ['start' => 22, 'end' => 26, 'text' => 'an electric kettle.'],
                ['start' => 26, 'end' => 30, 'text' => 'a coffee maker.'],
                ['start' => 30, 'end' => 35, 'text' => 'a blender.'],
                ['start' => 35, 'end' => 40, 'text' => 'a dishwasher.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])
