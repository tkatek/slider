<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-10/video/what-are-you-doing-encrypted/what-are-you-doing.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Advanced/chapter-10/img/slide-5.webp'),

    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => 'What is Mike doing?',
            'options' => ['He is cooking.', 'He is exercising.', 'He is sleeping.'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 32500,
            'type' => 'multiple_choice',
            'question' => 'What is Imma doing?',
            'options' => ['She is reading a book.', 'She is snowboarding.', 'She is listening to music.'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 38000,
            'type' => 'multiple_choice',
            'question' => 'What is Susan doing?',
            'options' => ['She is studying Spanish.', 'She is going to work.', 'She is cooking.'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 47000,
            'type' => 'multiple_choice',
            'question' => 'What is Mike doing?',
            'options' => ['He is watching TV.', 'He is studying English.', 'He is snowboarding.'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 51500,
            'type' => 'multiple_choice',
            'question' => 'What is Jack doing?',
            'options' => ['He is playing video games.', 'He is eating breakfast.', 'He is reading a book.'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 57500,
            'type' => 'multiple_choice',
            'question' => 'What is Susan doing?',
            'options' => ['She is sleeping.', 'She is eating lunch.', 'She is going to work.'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 64000,
            'type' => 'multiple_choice',
            'question' => 'What is Imma doing?',
            'options' => ['She is watching TV.', 'She is reading a book.', 'She is listening to music.'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 1.5,  'text' => 'Hello, Jack'],
        ['start' => 2,  'end' => 3,  'text' => 'Hi, Mike.'],
        ['start' => 3.7,  'end' => 5,  'text' => 'What are you doing?'],
        ['start' => 6,  'end' => 7,  'text' => "I'm exercising."],
        ['start' => 8.5,  'end' => 9.2,  'text' => 'Hi, Imma.'],
        ['start' => 9.5,  'end' => 10.5,  'text' => 'Hi, Jack.'],
        ['start' => 10.7,  'end' => 12,  'text' => 'What are you doing?'],
        ['start' => 12.7,  'end' => 14,  'text' => "I'm eating breakfast."],

        ['start' => 15,  'end' => 16,  'text' => 'Hi, Susan'],
        ['start' => 16.7,  'end' => 18,  'text' => 'Hi, Imma.'],
        ['start' => 18,  'end' => 19,  'text' => 'What are you doing?'],

        ['start' => 19.5,  'end' => 21.5,  'text' => "I'm going to work."],
        ['start' => 21.5,  'end' => 23,  'text' => 'What are you doing, Mike?'],
        ['start' => 23,  'end' => 24.5,  'text' => "I'm cooking."],

        ['start' => 24.5,  'end' => 26.5,  'text' => 'What are you doing now, Jack?'],
        ['start' => 27.5,  'end' => 28.5,  'text' => "Oh, I'm reading a book."],

        ['start' => 28.5,  'end' => 29.5,  'text' => 'What about you, Imma?'],
        ['start' => 30.5,  'end' => 32,  'text' => "I'm snowboarding."],

        ['start' => 32.7,  'end' => 34.5,  'text' => 'What are you doing, Susan?'],
        ['start' => 35.7,  'end' => 37.5,  'text' => "I'm studying Spanish."],

        ['start' => 42.5,  'end' => 44,  'text' => 'What is Mike doing?'],
        ['start' => 44.7,  'end' => 46.5,  'text' => "He's watching TV."],

        ['start' => 47.5,  'end' => 49,  'text' => 'What is Jack doing?'],
        ['start' => 49,  'end' => 51,  'text' => "He's playing video games."],

        ['start' => 53.7,  'end' => 55,  'text' => 'What is Susan doing?'],
        ['start' => 55,  'end' => 57,  'text' => "She's sleeping."],

        ['start' => 59.7,  'end' => 61,  'text' => "What's Imma doing?"],
        ['start' => 61,  'end' => 63.5,  'text' => "She's listening to music."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
