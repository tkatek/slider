<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-1/video/sports-encrypted/sports.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-1/video/thumbnail.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'showTranscript'=>0,//the opposite of quiz
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => " When we talk about sports, we use the verbs play, do and go.?"],
        ['start' => 4.5, 'end' => 8, 'text' => "We play football, we do aerobics, and we go jogging."],
        ['start' => 8.5, 'end' => 11.5, 'text' => "But do you know why we use these verbs with these sports?"],

        ['start' => 12.6, 'end' => 20.5, 'text' => " Well, let's look at some more examples. We play basketball and hockey. We do karate and ballet and we go dancing and swimming."],
        ['start' => 21.5, 'end' => 29, 'text' => "Now, do you see any patterns here? Is there anything that's different between the play sports, the do sports and the go sports?"],
        ['start' => 29.7, 'end' => 33, 'text' => "Well, let's take a look at the rules"],
        ['start' => 33.5, 'end' => 43, 'text' => "Play is used for sports that use a ball or a similar object and are played in a team. For example, football, basketball and hockey"],

        ['start' => 43.5, 'end' => 51, 'text' => " Do is used for sports that don't use a ball and don't usually have teams such as karate, ballet, and aerobics."],
        ['start' => 52.5, 'end' => 61, 'text' => "Go is a little bit different. We use go when the name of the sport ends in i-n-g like swimming, dancing and jogging."],
        ['start' => 61.2, 'end' => 69.5, 'text' => "Now sometimes you'll find a word that can fit into play and go, such as bowling. When this happens, go is usually the correct verb."],
        ['start' => 70, 'end' => 78.5, 'text' => " Now we're going to do some practice. I'm going to take the rules away. So pause here if you want to take some more time to remember the rules."],

        ['start' => 84, 'end' =>90, 'text' => "Here we have the verbs play, do and go and a list of ten sports."],
        ['start' => 90, 'end' =>93, 'text' => "Your job is to put the sports in the right place."],

        ['start' => 93, 'end' => 101, 'text' => "You should pause the video here. I recommend giving yourself one minute to complete this, but feel free to take more time if you need it."],
        ['start' => 107.5, 'end' => 109, 'text' => "And time's up!"],
        ['start' => 109, 'end' => 112, 'text' => "Now let's take a look at those answers."],
        ['start' => 114, 'end' => 122.5, 'text' => "Now here is your last task for a bit of fun. It's a quick fire round. I'll give you the sport and you need to give me the verb."],



    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

