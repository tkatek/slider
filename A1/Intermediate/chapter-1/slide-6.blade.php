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
        ['start' => 4, 'end' => 11, 'text' => "We play football, we do aerobics, and we go jogging. But do you know why we use these verbs with these sports?"],
        ['start' => 11, 'end' => 21, 'text' => " Well, let's look at some more examples. We play basketball and hockey. We do karate and ballet and we go dancing and swimming."],
        ['start' => 21, 'end' => 30, 'text' => "Now, do you see any patterns here? Is there anything that's different between the play sports, the do sports and the go sports?"],
        ['start' => 30, 'end' => 47, 'text' => "Well, let's take a look at the rules players use for sports that use a ball or a similar object and are played in a team. For example, football, basketball and hockey"],
        ['start' => 47, 'end' => 55, 'text' => " do is used for sports that don't use a ball and don't usually have teams such as karate, ballet, and aerobics."],
        ['start' => 55, 'end' => 64, 'text' => "Go is a little bit different. We use go when the name of the sport ends in i-n-g like swimming, dancing and jogging."],
        ['start' => 64, 'end' => 72, 'text' => "Now sometimes you'll find a word that can fit into play and go, such as bowling. When this happens, go is usually the correct verb."],
        ['start' => 72, 'end' => 82, 'text' => " Now we're going to do some practice. I'm going to take the rules away. So pause here if you want to take some more time to remember the rules."],
        ['start' => 87, 'end' =>96, 'text' => "Here we have the verbs play, do and go and a list of ten sports. Your job is to put the sports in the right place.Here we have the verbs play, do and go and a list of ten sports. Your job is to put the sports in the right place."],
        ['start' => 96, 'end' => 105, 'text' => "You should pause the video here. I recommend giving yourself one minute to complete this, but feel free to take more time if you need it."],
        ['start' => 111, 'end' => 120, 'text' => "And time's up! Now let's take a look at those answers. Remember to let me know how you did in the comments below."],
        ['start' => 122, 'end' => 131, 'text' => "Now here is your last task for a bit of fun. It's a quick fire round. I'll give you the sport and you need to give me the verb."],
        ['start' => 225, 'end' => 229, 'text' => "Now here's your homework. I want you to write three sentences in the comments below."],
        ['start' => 230, 'end' => 237, 'text' => ". I want you to use the sports and the verbs from today's lesson, and I'll be checking and giving feedback for the next few days."],
        ['start' => 237, 'end' => 244, 'text' => " Now remember to hit like and subscribe and I'll see you next time. Bye bye."],

    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

