<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-6/video/emergency-calls.mp4'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-6/img/thumbnail-emergency-calls.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 6,  'end' => 8,  'text' => 'Hello. I need an ambulance right now.'],
        ['start' => 8,  'end' => 9,  'text' => 'This is 911. Tell me what happened.'],
        ['start' => 9,  'end' => 12, 'text' => "My dad just collapsed. He's on the floor."],
        ['start' => 12, 'end' => 14, 'text' => 'Is he awake?'],
        ['start' => 14, 'end' => 16, 'text' => "No, he's not moving."],
        ['start' => 16, 'end' => 19, 'text' => 'Is he breathing?'],
        ['start' => 19, 'end' => 21, 'text' => "Yes, but it's very slow."],
        ['start' => 21, 'end' => 23, 'text' => 'Okay. Any history of heart problems?'],
        ['start' => 23, 'end' => 27, 'text' => 'Yes, he has high blood pressure.'],
        ['start' => 27, 'end' => 30, 'text' => "What's your address?"],
        ['start' => 30, 'end' => 31, 'text' => '125 Main Street, apartment 3B.'],
        ['start' => 31, 'end' => 34, 'text' => 'Got it. Help is on the way. Stay with him.'],
        ['start' => 34, 'end' => 35, 'text' => 'How long will it take?'],
        ['start' => 35, 'end' => 38, 'text' => 'Help is on the way. They should be there very soon.'],
        ['start' => 38, 'end' => 41, 'text' => "Okay, I'll wait at the door."],
    ],


];

?>
@include("slider.video.interactive",['content'=>$content])

