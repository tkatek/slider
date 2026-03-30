<?php
    $content=[
        'video'=>materialAsset('slider/A1/Beginner/chapter-1/video/encrypted/video-1.m3u8'),
        'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-1/video/thumb.png'),
        'isQuiz'=>1,//1 show question / 0 don't
        'questions'=>[
            [
                'time' => 13200,
                'type' => 'multiple_choice',
                'question' => 'What household chore are they talking about?',
                'options' => ['Doing laundry', 'Bringing out the garbage', 'Washing dishes', 'Cleaning the house'],
                'correct_answer' => 1,
                'points' => 10
            ],
            [
                'time' => 22500,
                'type' => 'multiple_choice',
                'question' => 'What type of greeting is this?',
                'options' => ['A very formal introduction', 'An informal introduction between friends', 'A business meeting introduction', 'A public announcement'],
                'correct_answer' => 1,
                'points' => 10
            ],
            [
                'time' => 32800,
                'type' => 'multiple_choice',
                'question' => 'When someone says,” Nice to meet you,” you respond:',
                'options' => ['Goodbye', 'How are you?', 'I’m fine, thanks.', 'Nice to meet you, too.'],
                'correct_answer' => 3,
                'points' => 10
            ]
        ],
        'subtitles'=>[
            ['start' => 5.2, 'end' => 6.2, 'text' => "It's garbage day again."],
            ['start' => 6.3, 'end' => 9.9, 'text' => "Yes, it is. Time to bring our garbage outside"],
            ['start' => 10, 'end' => 10.9, 'text' => "I'm Jennifer.."],
            ['start' => 11, 'end' => 12, 'text' => "I'm Jana. Nice to meet you."],
            ['start' => 12, 'end' => 13, 'text' => "Nice to meet you, too."],
            ['start' => 14.6, 'end' => 17, 'text' => "Oh, hi Tom, perfect timing."],
            ['start' => 17.1, 'end' => 21, 'text' => "Hey Jana, this is Tom, my new friend from English class. He'll be studying with us today."],
            ['start' => 21.1, 'end' => 22, 'text' => "Nice to meet you."],
            ['start' => 22, 'end' => 23, 'text' => "Nice to meet you, too."],
            ['start' => 25, 'end' => 30, 'text' => "Oh Mr. Smith, I'd like to introduce to you Miss Sara. She's the new sales manager and she just moved here from Toronto."],
            ['start' => 30.1, 'end' => 31, 'text' => "It's a pleasure to meet you"],
            ['start' => 31, 'end' => 33, 'text' => "Nice to meet you, too"],
        ]

    ];

?>
@include("slider.video.interactive",['content'=>$content])

