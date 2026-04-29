<?php
$content = [
    'video'          => materialAsset('slider/A2/Beginner/chapter-10/video/encrypted/slide-5.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-10/img/slide-5.webp'),
    'isQuiz'         => 0,
    'showCC'         => false,
    'showTranscript' => false,
    'questions'      => [],
    'subtitles'      => [],
    'transcript'     => [],
];
?>

@include('slider.video.interactive', ['content' => $content])