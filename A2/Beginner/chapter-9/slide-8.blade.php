<?php
$content = [
    'page_title' => '',
    'title' => "Let’s watch this video",
    'subtitle' => "Has he/ she got straight hair?",

    'video' => materialAsset('slider/A2/Beginner/chapter-9/video/people-description-encrypted/people-description.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-9/img/slide8.webp'),


    'isQuiz' => 0,

    'questions' => [],

    'subtitles' => [
        ['start' => 0, 'end' => 4.7, 'text' => 'Use the verb: "Has got" to describe these people.'],
        ['start' => 5.8, 'end' => 7.5, 'text' => 'She has got'],
        ['start' => 12, 'end' => 15, 'text' => 'He has got'],
        ['start' => 18.7, 'end' => 21, 'text' => "He hasn't got"],
        ['start' => 21.7, 'end' => 23, 'text' => 'He is'],
        ['start' => 25.5, 'end' => 30, 'text' => 'She has got'],
        ['start' => 31.5, 'end' => 34, 'text' => 'He has got'],
        ['start' => 38, 'end' => 40, 'text' => 'She has got'],

        ['start' => 44.8, 'end' => 47, 'text' => 'He has got'],
        ['start' => 50.5, 'end' => 53, 'text' => 'He has got'],
        ['start' => 57, 'end' => 59.5, 'text' => 'She has got'],
        ['start' => 63.5, 'end' => 66, 'text' => 'She has got'],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])