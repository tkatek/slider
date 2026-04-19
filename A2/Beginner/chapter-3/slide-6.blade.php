<?php
$content = [
    'title'          => "Let's Watch This Video",
    'video'          => materialAsset('slider/A2/Beginner/chapter-3/'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide6.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 26000,
            'type' => 'multiple_choice',
            'question' => '1- What is the weather like now?',
            'options' => ['Cold and snowy', 'Sunny and warm', 'Windy and rainy'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => '2- What will happen tonight?',
            'options' => ['It will snow', 'It will rain', 'It will be sunny'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 57000,
            'type' => 'multiple_choice',
            'question' => '3- What will the weather be like on Wednesday?',
            'options' => ['Sunny', 'Snowy', 'Windy'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => '4- What will happen on Thursday?',
            'options' => ['A big storm', 'A sunny day', 'A cold morning'],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 8,   'end' => 19,  'text' => "Three, two, good afternoon. I'm Maria from Chicago News. Let's look at our weather for today."],
        ['start' => 19,  'end' => 26,  'text' => "This morning it was cold and cloudy, but now it's beautiful outside."],
        ['start' => 26,  'end' => 32,  'text' => "Right now it's 72 degrees, it's sunny, nice and warm."],
        ['start' => 32,  'end' => 40,  'text' => "Later tonight it will rain, and the temperature will go down to 51 degrees."],
        ['start' => 40,  'end' => 48,  'text' => "And there's more crazy weather coming this week. Let's look at our five day forecast."],
        ['start' => 48,  'end' => 57,  'text' => "Tomorrow, Tuesday, it will be sunny and warm, 77 degrees."],
        ['start' => 57,  'end' => 68,  'text' => "Then on Wednesday, it will snow. The temperature will go down to 31 degrees. A pretty cold day."],
        ['start' => 68,  'end' => 83,  'text' => "On Thursday, there will be a big storm. Be careful! It will rain a lot and it will be very windy. The temperature will be about 56 degrees."],
        ['start' => 83,  'end' => 93,  'text' => "On Friday, it will be a little windy and a little cloudy. The temperature will be 67 degrees."],
        ['start' => 93,  'end' => 101, 'text' => "And on Saturday, it will snow again. The temperature will be 32 degrees."],
        ['start' => 101, 'end' => 113, 'text' => "Welcome to the crazy weather in Chicago! Again, I'm Maria from Chicago News. Thanks for watching, and have a good week."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])