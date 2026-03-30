<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/under-the-weather.mp4'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/thumbnail-under-the-weather.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 49, 'end' => 55, 'text' => "Kevin, morning! Don't forget we have a meeting at 2 o'clock today!"],
        ['start' => 55, 'end' => 60, 'text' => "Morning, boss. Sorry I can't come to work today. I'm under the weather."],
    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

