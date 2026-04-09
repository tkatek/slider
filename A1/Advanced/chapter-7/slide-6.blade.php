<?php
$content = [
    'page_title' => 'What is this sign called?',
    'title'      => 'What is this sign called?',
    'subtitle'   => 'Let’s watch this video!',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Advanced/chapter-7/video/'),
            'thumbnail' => materialAsset('slider/A1/Advanced/chapter-7/img/slide5.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 2,  'text' => 'What is this sign called?'],
                ['start' => 2,  'end' => 6,  'text' => 'Stop sign.'],
                ['start' => 6,  'end' => 10, 'text' => 'What is this sign called?'],
                ['start' => 10, 'end' => 12, 'text' => 'No entry.'],
                ['start' => 12, 'end' => 15, 'text' => 'What is this sign called?'],
                ['start' => 15, 'end' => 17, 'text' => 'Warning.'],
                ['start' => 17, 'end' => 19, 'text' => 'What is this sign called?'],
                ['start' => 19, 'end' => 22, 'text' => 'One way.'],
                ['start' => 22, 'end' => 24, 'text' => 'What is this sign called?'],
                ['start' => 24, 'end' => 26, 'text' => "It's fragile."],
                ['start' => 26, 'end' => 29, 'text' => 'What is this sign called?'],
                ['start' => 29, 'end' => 31, 'text' => 'Parking.'],
                ['start' => 31, 'end' => 35, 'text' => 'What is this sign called?'],
                ['start' => 35, 'end' => 37, 'text' => 'No parking.'],
                ['start' => 37, 'end' => 40, 'text' => 'What is this sign called?'],
                ['start' => 40, 'end' => 44, 'text' => 'Recycle.'],
                ['start' => 44, 'end' => 46, 'text' => 'Danger. Goodbye.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])