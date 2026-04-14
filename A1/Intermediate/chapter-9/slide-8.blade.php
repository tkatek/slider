<?php
$content = [
    'video'      => materialAsset('slider/A1/Intermediate/chapter-9/video/business-trip-encrypted/business-trip.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Intermediate/chapter-9/img/business-trip.webp'),
    'isQuiz'     => 1,
    'showTranscript' => 0,

    'questions'  => [
        [
            'time' => 6200,
            'type' => 'multiple_choice',
            'question' => '1- What type of journey is this?',
            'options' => ['a beach vacation', 'a business trip', 'a city tour'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 12200,
            'type' => 'multiple_choice',
            'question' => '2- What does the speaker recommend bringing for a business trip?',
            'options' => ['Only clothes', 'Laptop, cell phone, and chargers', 'A book and snacks'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 18700,
            'type' => 'multiple_choice',
            'question' => '3- His advice is to bring only a carry-on bag. Why?',
            'options' => ['To save money', 'To avoid waiting for luggage', 'To have more space in the hotel room'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],


    'subtitles' => [
        ['start' => 0,  'end' => 4,  'text' => 'What should I bring on this business trip?'],
        ['start' => 4,  'end' => 6,  'text' => "Haven't you been on a business trip before?"],
        ['start' => 7,  'end' => 9,  'text' => 'No, this is my first time.'],
        ['start' => 9,  'end' => 12, 'text' => 'You should bring your laptop, cellphone, and chargers.'],
        ['start' => 12, 'end' => 14, 'text' => 'Any other advice?'],
        ['start' => 14, 'end' => 18.5, 'text' => "Bring a carry-on bag only, so you don't have to wait for your luggage."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])