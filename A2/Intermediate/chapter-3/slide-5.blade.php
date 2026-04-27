<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-3/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-3/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [

    ],
    'subtitles'  => [

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
