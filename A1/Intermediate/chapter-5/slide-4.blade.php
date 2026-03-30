<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-5/video/at-the-pharmacy.mp4'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-5/thumbnail-at-the-pharmacy.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 19, 'end' => 22, 'text' => "Customer: Good morning. I'm not feeling well. I have a cough and a sore throat. I need something for the cough."],
        ['start' => 40, 'end' => 43, 'text' => 'Pharmacist: I’m sorry to hear that. I recommend Cough Stop syrup.'],
        ['start' => 48, 'end' => 51, 'text' => 'Pharmacist: Take two teaspoons three times a day after meals.'],
        ['start' => 62, 'end' => 64, 'text' => 'Pharmacist: It’s usually safe, but it may cause mild drowsiness.'],
        ['start' => 81, 'end' => 85, 'text' => 'Pharmacist: Lozenges can also help if your throat feels sore.'],
        ['start' => 92, 'end' => 95, 'text' => "Customer: Great! I'll take one bottle of syrup and a pack of lozenges, please."],
        ['start' => 99, 'end' => 102,'text' => "Customer: And tissues would be helpful, too. For how long should I take it?"],
        ['start' => 102,'end' => 106,'text' => 'Pharmacist: For three days. That will be $18.'],
        ['start' => 109,'end' => 112,'text' => 'Pharmacist: I hope you feel better soon!'],
    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

