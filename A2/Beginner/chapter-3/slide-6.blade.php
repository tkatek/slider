<?php
$content = [
    'title'          => "Let's Watch This Video",
    'video'          => materialAsset('slider/A2/Beginner/chapter-3/video/weather-news-encrypted/weather-news.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide6.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 19200,
            'type' => 'multiple_choice',
            'question' => '1- What is the weather like now?',
            'options' => ['Cold and snowy', 'Sunny and warm', 'Windy and rainy'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 24900,
            'type' => 'multiple_choice',
            'question' => '2- What will happen tonight?',
            'options' => ['It will snow', 'It will rain', 'It will be sunny'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 48800,
            'type' => 'multiple_choice',
            'question' => '3- What will the weather be like on Wednesday?',
            'options' => ['Sunny', 'Snowy', 'Windy'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 49400,
            'type' => 'multiple_choice',
            'question' => '4- What will happen on Thursday?',
            'options' => ['A big storm', 'A sunny day', 'A cold morning'],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 3.5,   'end' => 9,  'text' => "Good afternoon. I'm Maria from Boston News. Let's look at our weather for today."],
        ['start' => 9.7,  'end' => 14,  'text' => "This morning it was cold and cloudy, but now it's beautiful outside."],
        ['start' => 14.5,  'end' => 19,  'text' => "Right now it's 72 degrees, it's sunny, nice and warm."],
        ['start' => 19.7,  'end' => 24.5,  'text' => "Later tonight it will rain, and the temperature will go down to 51 degrees."],
        ['start' => 25.7,  'end' => 28.5,  'text' => "And there's more crazy weather coming this week."],
        ['start' => 29.7,  'end' => 32,  'text' => "Let's look at our five day forecast."],
        ['start' => 32,  'end' => 36,  'text' => "Tomorrow, Tuesday, it will be sunny and warm, 77 degrees."],
        ['start' => 36.2,  'end' => 39,  'text' => "Then on Wednesday, it will snow."],
        ['start' => 39,  'end' => 45,  'text' => "On Thursday, there will be a big storm. Be careful! It will rain a lot and it will be very windy. "],
        ['start' => 45,  'end' => 46.8,  'text' => "On Friday, it will be a little windy."],
        ['start' => 47,  'end' => 48.5, 'text' => "On Saturday, it will snow again."],
        ['start' => 50.5, 'end' => 58, 'text' => "Welcome to the crazy weather in Boston! Again, I'm Maria from Boston News. Thanks for watching, and have a good week."],
        ['start' => 60.8, 'end' => 67, 'text' => "The weather for tonight is a clear night, with a low of 28 degrees, we'll see you tomorrow"],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])