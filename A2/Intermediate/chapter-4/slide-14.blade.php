<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => 'How was your day?',
    'video'      => materialAsset('slider/A2/Intermediate/chapter-4/video/how-day-encrypted/how-day.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-4/img/slide15.webp'),
    'isQuiz'     => 0,
    'questions'  => [],

    'subtitles'  => [
        ['start' => 0,  'end' => 2,  'text' => 'How was your day?'],
        ['start' => 2.7,  'end' => 4.5,  'text' => '1. Really good.'],
        ['start' => 5,  'end' => 7.5, 'text' => '2. Pretty uneventful.'],
        ['start' => 7.5, 'end' => 13, 'text' => 'This means that nothing particularly special or interesting happened during the day.'],
        ['start' => 13.5, 'end' => 15.5, 'text' => '3. Very productive.'],
        ['start' => 15.7, 'end' => 18, 'text' => '4. Super busy.'],
        ['start' => 18.5, 'end' => 20.7, 'text' => '5. A total nightmare.'],
        ['start' => 20.7, 'end' => 29, 'text' => 'A nightmare is a terrible scary dream. Describing an experience as a nightmare means it was horrible.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])