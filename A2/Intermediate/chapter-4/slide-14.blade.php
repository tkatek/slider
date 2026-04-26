<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => 'How was your day?',
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset(''),
    'isQuiz'     => 0,
    'questions'  => [],

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'How was your day?'],
        ['start' => 4,  'end' => 8,  'text' => 'Really good.'],
        ['start' => 8,  'end' => 16, 'text' => 'Pretty uneventful.'],
        ['start' => 16, 'end' => 28, 'text' => 'This means that nothing particularly special or interesting happened during the day.'],
        ['start' => 28, 'end' => 32, 'text' => 'Very productive.'],
        ['start' => 32, 'end' => 36, 'text' => 'Super busy.'],
        ['start' => 36, 'end' => 48, 'text' => 'A total nightmare.'],
        ['start' => 48, 'end' => 64, 'text' => 'A nightmare is a terrible scary dream. Describing an experience as a nightmare means it was horrible.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])