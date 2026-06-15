<?php
$content = [
    'video'     => materialAsset('slider/A2/Intermediate/chapter-12/video/point-at-someone-encrypted/point-at-someone.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles'  => [
        ['start' => 0,  'end' => 3, 'text' => 'Point at someone or something.'],
        ['start' => 3.7, 'end' => 6, 'text' => 'Nod your head or shake your head.'],
        ['start' => 7.7, 'end' => 9.5, 'text' => 'Fold your arms.'],
        ['start' => 10, 'end' => 12, 'text' => 'Wink at someone.'],
        ['start' => 13, 'end' => 15, 'text' => 'Shrug your shoulders.'],
        ['start' => 16, 'end' => 18, 'text' => 'Snap your fingers.'],
        ['start' => 19, 'end' => 21, 'text' => 'Beckon to someone.'],
        ['start' => 21.7, 'end' => 23, 'text' => 'Clench your fist.'],
        ['start' => 24.5, 'end' => 26, 'text' => 'Crack your knuckles.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])