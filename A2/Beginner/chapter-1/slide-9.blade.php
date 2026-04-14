<?php
$content = [
    'video'          => materialAsset('slider/A2/Beginner/chapter-1/video/weather-conversations-encrypted/weather-conversations.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-2/img/slide6.webp'),
    'isQuiz'         => 1,
    'showTranscript' => 0,

    'questions'      => [

    ],

    'subtitles' => [

        ['start' => 6,    'end' => 10,   'text' => "Conversations. How's the weather?"],
        ['start' => 10,   'end' => 11,   'text' => 'Hello.'],

        ['start' => 11,   'end' => 16,   'text' => "Bully, where are you? I'm in Mumbai."],
        ['start' => 16,   'end' => 18,   'text' => 'What are you doing in Mumbai?'],
        ['start' => 18,   'end' => 21,   'text' => "I'm taking some photos."],
        ['start' => 21,   'end' => 25,   'text' => "How's the weather? It's hot and sunny."],

        ['start' => 25,   'end' => 28,   'text' => "Where are you? I'm in London."],
        ['start' => 28,   'end' => 32,   'text' => "What are you doing in London? I'm working."],
        ['start' => 32,   'end' => 35,   'text' => "How's the weather?"],
        ['start' => 35,   'end' => 39,   'text' => "It's raining. Hello. Hi. Ha."],

        ['start' => 39,   'end' => 43,   'text' => "Where are you? I'm in Japan. What are you doing?"],
        ['start' => 43,   'end' => 47,   'text' => "I'm skiing. How's the weather? It's snowing."],
        ['start' => 47,   'end' => 50,   'text' => 'Hello.'],

        ['start' => 50,   'end' => 54,   'text' => "Hi. Hello. Hi. Where are you? I'm in Beijing."],
        ['start' => 54,   'end' => 58,   'text' => "What are you doing? I'm shopping."],
        ['start' => 58,   'end' => 61,   'text' => "How's the weather? It's windy and cold."],

        ['start' => 63,   'end' => 68,   'text' => "Hello. Hello. Hi. Hello. Where are you?"],
        ['start' => 68,   'end' => 71,   'text' => "I'm in Argentina. What are you doing?"],
        ['start' => 71,   'end' => 75,   'text' => "I'm eating lunch. How's the weather?"],
        ['start' => 75,   'end' => 79,   'text' => "It's cloudy and cold. How's the weather in Mumbai?"],
        ['start' => 79,   'end' => 83,   'text' => "It's hot and sunny. How's the weather in Japan?"],
        ['start' => 83,   'end' => 85,   'text' => "It's snowing."],
        ['start' => 85,   'end' => 88,   'text' => "How's the weather in London? It's raining."],
        ['start' => 88,   'end' => 91,   'text' => "How's the weather in Argentina? It's cloudy and cold."],
        ['start' => 91,   'end' => 99,   'text' => "How's the weather in Beijing? It's windy and cold."],

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])