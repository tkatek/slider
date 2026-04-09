<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-5/video/pharmacy-encrypted/pharmacy.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-5/thumbnail-at-the-pharmacy.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 03.5, 'end' => 7, 'text' => "Customer: Good morning. I'm not feeling well."],
        ['start' => 7, 'end' => 9, 'text' => "Customer: I have a cough and a sore throat."],
        ['start' => 9.5, 'end' => 11, 'text' => "Customer: I need something for the cough."],
        ['start' => 11.5, 'end' => 13.5, 'text' => 'Pharmacist: I’m sorry to hear that.'],
        ['start' => 13.5, 'end' => 16, 'text' => 'Pharmacist: I recommend Cough Stop syrup.'],
        ['start' => 16.5, 'end' => 19, 'text' => 'Pharmacist: Take two teaspoons three times a day after meals.'],
        ['start' => 20, 'end' => 23, 'text' => 'Pharmacist: It’s usually safe, but it may cause mild drowsiness.'],
        ['start' => 23.5, 'end' => 26, 'text' => 'Pharmacist: Lozenges can also help if your throat feels sore.'],
        ['start' => 26, 'end' => 31, 'text' => "Customer: Great! I'll take one bottle of syrup and a pack of lozenges, please."],
        ['start' => 31, 'end' => 33.5,'text' => "Customer: And tissues would be helpful, too."],
        ['start' => 34, 'end' => 35,'text' => "Customer: For how long should I take it?"],
        ['start' => 35.5,'end' => 37,'text' => 'Pharmacist: For three days.'],
        ['start' => 37.5,'end' => 39,'text' => 'Pharmacist: That will be $18.'],
        ['start' => 40,'end' => 42,'text' => 'Pharmacist: I hope you feel better soon!'],
    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

