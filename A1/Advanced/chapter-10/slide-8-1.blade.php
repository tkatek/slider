<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-10/video/present-continuous-encrypted/present-continuous.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-10/img/present-continues.webp'),

    'isQuiz' => 0,

    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'The present continuous'],
        ['start' => 3.5,  'end' => 7,  'text' => 'How do we form the present continuous'],
        ['start' => 7,  'end' => 9,  'text' => 'Affirmative'],
        ['start' => 10.7,  'end' => 15.5,  'text' => "Subject + be + present participle + object "],
        ['start' => 17,  'end' => 20,  'text' => 'Andy is washing the car'],
        ['start' => 22,  'end' => 25,  'text' => 'How do we form the present continuous?'],
        ['start' => 25,  'end' => 27,  'text' => 'Negative'],
        ['start' => 28.5,  'end' => 34,  'text' => "Subject + be + not + present participle + object "],
        ['start' => 35.8,  'end' => 39,  'text' => "I am not talking to Hannah"],
        ['start' => 39.5,  'end' => 43,  'text' => "How do we form the present continuous?"],
        ['start' => 43,  'end' => 45,  'text' => 'Interrogative'],
        ['start' => 46.5,  'end' => 51,  'text' => "Be + subject + present participle + object"],
        ['start' => 52,  'end' => 55,  'text' => "Are you doing a presentation?"],



    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
