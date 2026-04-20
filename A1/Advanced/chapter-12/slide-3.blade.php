<?php
$content = [
    'video'      => materialAsset('slider/A1/Beginner/chapter-2/video/encrypted/slide5.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Beginner/chapter-2/video/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [

    ],
    // Video script (subtitles)
    'subtitles'  => [

    ],
];
?>
@include("slider.video.interactive", ['content' => $content])