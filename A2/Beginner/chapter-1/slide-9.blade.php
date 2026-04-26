<?php
$content = [
    'video'          => materialAsset('slider/A2/Beginner/chapter-1/video/describing-the-weather-encrypted/describing-the-weather.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-2/img/slide5.webp'),
    'showTranscript' => 0,
    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 16000, // after "It's hot and sunny."
            'type' => 'multiple_choice',
            'question' => "How's the weather in this picture?",
            'options' => [
                "It's raining.",
                "It's hot and sunny.",
                "It's snowing.",
                "It's windy and cold.",
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 49500, // after "It's snowing."
            'type' => 'multiple_choice',
            'question' => "How's the weather in this picture?",
            'options' => [
                "It's cloudy.",
                "It's raining.",
                "It's snowing.",
                "It's hot and sunny.",
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 73500, // after "It's windy and cold."
            'type' => 'multiple_choice',
            'question' => "How's the weather in this picture?",
            'options' => [
                "It's windy and cold.",
                "It's hot and sunny.",
                "It's raining.",
                "It's snowing.",
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 94500, // after "It's cloudy and cold."
            'type' => 'multiple_choice',
            'question' => "How's the weather in this picture?",
            'options' => [
                "It's snowing.",
                "It's cloudy.",
                "It's windy and cold.",
                "It's hot and sunny.",
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 107500, // after "It's raining."
            'type' => 'multiple_choice',
            'question' => "How's the weather in this picture?",
            'options' => [
                "It's raining.",
                "It's cloudy.",
                "It's hot and sunny.",
                "It's windy and cold.",
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],



    'subtitles' => [
        ['start' => 0,    'end' => 3.5,  'text' => 'Hello Jake, where are you?'],
        ['start' => 3.7,  'end' => 5,    'text' => "I'm in Mumbai."],
        ['start' => 6,    'end' => 9,    'text' => 'What are you doing in Mumbai?'],
        ['start' => 10,   'end' => 12,   'text' => "I'm taking some photos."],
        ['start' => 13,   'end' => 14,   'text' => "How's the weather?"],
        ['start' => 14.7, 'end' => 15.5, 'text' => "It's hot and sunny."],
        ['start' => 16.5, 'end' => 17.5, 'text' => "Where are you?"],
        ['start' => 18.5, 'end' => 20,   'text' => "I'm in London."],

        ['start' => 21,   'end' => 23,   'text' => 'What are you doing in London?'],
        ['start' => 23.5, 'end' => 25,   'text' => "I'm working."],
        ['start' => 25.7, 'end' => 27,   'text' => "How's the weather?"],
        ['start' => 28.5, 'end' => 29.5, 'text' => "It's raining."],
        ['start' => 30.5, 'end' => 31.5, 'text' => 'Hello.'],
        ['start' => 32,   'end' => 33,   'text' => 'Hi.'],
        ['start' => 34,   'end' => 35,   'text' => 'Hey.'],
        ['start' => 35.7, 'end' => 37,   'text' => 'Where are you?'],
        ['start' => 37,   'end' => 39,   'text' => "I'm in Japan."],
        ['start' => 40,   'end' => 42,   'text' => 'What are you doing?'],
        ['start' => 42,   'end' => 44,   'text' => "I'm skiing."],
        ['start' => 46.5, 'end' => 48,   'text' => "How's the weather?"],
        ['start' => 48,   'end' => 49,   'text' => "It's snowing."],
        ['start' => 52.5, 'end' => 53.5, 'text' => 'Hi.'],

        ['start' => 53.5, 'end' => 56,   'text' => 'Hi. Hello. Hi.'],
        ['start' => 58.5, 'end' => 60,   'text' => 'Where are you?'],
        ['start' => 60,   'end' => 62,   'text' => "I'm in Beijing."],
        ['start' => 63.5, 'end' => 65,   'text' => 'What are you doing?'],
        ['start' => 65.5, 'end' => 67,   'text' => "I'm shopping."],
        ['start' => 68.5, 'end' => 70,   'text' => "How's the weather?"],
        ['start' => 71,   'end' => 73,   'text' => "It's windy and cold."],

        ['start' => 74.5, 'end' => 76,   'text' => 'Hello.'],
        ['start' => 76,   'end' => 79,   'text' => 'Hello. Hi. Hello.'],
        ['start' => 80,   'end' => 81.5, 'text' => 'Where are you?'],
        ['start' => 81.5, 'end' => 83,   'text' => "I'm in Argentina."],
        ['start' => 86.5, 'end' => 87.5, 'text' => 'What are you doing?'],
        ['start' => 87.8, 'end' => 89,   'text' => "I'm eating lunch."],
        ['start' => 91,   'end' => 92,   'text' => "How's the weather?"],
        ['start' => 92.5, 'end' => 94,   'text' => "It's cloudy and cold."],

        ['start' => 95,    'end' => 97,    'text' => "How's the weather in Mumbai?"],
        ['start' => 97,    'end' => 99,    'text' => "It's hot and sunny."],
        ['start' => 99.5,  'end' => 101,   'text' => "How's the weather in Japan?"],
        ['start' => 101.5, 'end' => 103,   'text' => "It's snowing."],
        ['start' => 104,   'end' => 106,   'text' => "How's the weather in London?"],
        ['start' => 106,   'end' => 107,   'text' => "It's raining."],
        ['start' => 107.5, 'end' => 109.5, 'text' => "How's the weather in Argentina?"],
        ['start' => 109.5, 'end' => 111,   'text' => "It's cloudy and cold."],
        ['start' => 112,   'end' => 113.5, 'text' => "How's the weather in Beijing?"],
        ['start' => 113.8, 'end' => 115.5, 'text' => "It's windy and cold."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
