<?php
$content = [
    'video'          => materialAsset('slider/A1/Intermediate/chapter-7/video/top-countries-encrypted/top-countries.m3u8'), // add video path
    'thumbnail'      => materialAsset('slider/A1/Intermediate/chapter-7/img/slide6.webp'), // add thumbnail path
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions'      => [

    ],

    'subtitles' => [

        ['start' => 0,  'end' => 3.5,  'text' => 'Top 10 most beautiful countries in the world'],
        ['start' => 5.5,  'end' => 7,  'text' => 'Turkey'],

        ['start' => 20.5,  'end' => 22, 'text' => 'Brazil'],
        ['start' => 41.5, 'end' => 43, 'text' => 'Ireland'],
        ['start' => 51.5, 'end' => 53, 'text' => 'Australia'],

        ['start' => 77, 'end' => 78.5, 'text' => 'Norway'],
        ['start' => 106.5, 'end' => 108, 'text' => 'Iceland'],
        ['start' => 137.5, 'end' => 139, 'text' => 'switzerland'],

        ['start' => 161.5, 'end' => 163, 'text' => 'Italy'],
        ['start' => 180, 'end' => 181.5, 'text' => 'Greece'],
        ['start' => 200.7, 'end' => 202, 'text' => 'New zealand'],



    ],
];
?>

@include("slider.video.interactive", ['content' => $content])