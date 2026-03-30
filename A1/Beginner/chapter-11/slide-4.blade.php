<?php
$content=[
    'video'=>materialAsset('slider/A1/Beginner/chapter-11/video/houses-encrypted/houses.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-11/video/thumbnail-houses.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Types of houses'],
        ['start' => 4,  'end' => 6,  'text' => 'This is a Camper van'],
        ['start' => 8,  'end' => 10,  'text' => 'Detached house'],
        ['start' => 11,  'end' => 13,  'text' => 'Semi-detached house'],
        ['start' => 15,  'end' => 17, 'text' => 'Lighthouse'],
        ['start' => 18, 'end' => 20, 'text' => 'Cottage'],
        ['start' => 22, 'end' => 24, 'text' => 'Villa'],
        ['start' => 26, 'end' => 32, 'text' => 'A block of flats in British english or Apartment building in American english'],
        ['start' => 34, 'end' => 36, 'text' => 'Terraced houses'],
        ['start' => 38, 'end' => 41, 'text' => 'Skyscraper or High-rise'],
    ],


];

?>
@include("slider.video.interactive",['content'=>$content])

