<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-6/video/calling-911-encrypted/calling-911.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-6/img/thumbnail-emergency-calls.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Hello. I need an ambulance right now.'],
        ['start' => 3,  'end' => 5,  'text' => 'This is 911. Tell me what happened.'],
        ['start' => 5,  'end' => 8, 'text' => "It's my dad he just collapsed on the floor."],
        ['start' => 8, 'end' => 9.5, 'text' => 'Is he awake?'],
        ['start' => 10, 'end' => 11.7, 'text' => "No, he's not moving."],
        ['start' => 12, 'end' => 13.5, 'text' => 'Is he breathing?'],
        ['start' => 15.5, 'end' => 17.5, 'text' => "Yes, but it's very slow."],
        ['start' => 17.8, 'end' => 20.5, 'text' => 'Okay. Any history of heart problems?'],
        ['start' => 20.5, 'end' => 22.7, 'text' => 'Yes, he has high blood pressure.'],
        ['start' => 22.7, 'end' => 24, 'text' => "What's your address?"],
        ['start' => 24, 'end' => 27, 'text' => '125 Main Street, apartment 3B.'],
        ['start' => 27, 'end' => 30, 'text' => 'Got it. Help is on the way. Stay with him.'],
        ['start' => 30, 'end' => 32.8, 'text' => 'How long will it take?'],
        ['start' => 33, 'end' => 35, 'text' => 'Help is on the way. They should be there very soon.'],
        ['start' => 36, 'end' => 39, 'text' => "Okay, I'll wait at the door, Please hurry."],
    ],


];

?>
@include("slider.video.interactive",['content'=>$content])

