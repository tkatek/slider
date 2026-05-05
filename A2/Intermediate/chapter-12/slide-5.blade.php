<?php
$content = [
    'video'     => materialAsset('slider/A2/Intermediate/chapter-12/'),
    'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles'  => [
        ['start' => 0,  'end' => 6,  'text' => "Let's learn body language gestures."],
        ['start' => 6,  'end' => 12, 'text' => 'Point at someone or something.'],
        ['start' => 12, 'end' => 18, 'text' => 'Nod your head or shake your head.'],
        ['start' => 18, 'end' => 24, 'text' => 'Fold your arms.'],
        ['start' => 24, 'end' => 30, 'text' => 'Wink at someone.'],
        ['start' => 30, 'end' => 36, 'text' => 'Shrug your shoulders.'],
        ['start' => 36, 'end' => 42, 'text' => 'Snap your fingers.'],
        ['start' => 42, 'end' => 48, 'text' => 'Beckon to someone.'],
        ['start' => 48, 'end' => 54, 'text' => 'Clench your fist.'],
        ['start' => 54, 'end' => 60, 'text' => 'Crack your knuckles.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])