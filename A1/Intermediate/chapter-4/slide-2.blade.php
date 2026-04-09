<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/under-weather-encrypted/under-weather.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/thumbnail-under-the-weather.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 20.5, 'end' => 22, 'text' => 'Oh no! No no no!'],
        ['start' => 23, 'end' => 24.5, 'text' => "I can't get sick."],
        ['start' => 31, 'end' => 33, 'text' => 'Uh, turn off already.'],
        ['start' => 35.5, 'end' => 36.5, 'text' => 'I feel awful.'],
        ['start' => 52.5, 'end' => 55, 'text' => "Carl, good morning."],
        ['start' => 55, 'end' => 58, 'text' => "Don't forget we have a meeting at 2 o'clock today."],
        ['start' => 58.5, 'end' => 60, 'text' => 'Morning, boss.'],
        ['start' => 60.5, 'end' => 64, 'text' => "Sorry, I can't come to work today."],
        ['start' => 64, 'end' => 66, 'text' => "I'm under the weather."],
    ],


];

?>
@include("slider.video.interactive",['content'=>$content])

