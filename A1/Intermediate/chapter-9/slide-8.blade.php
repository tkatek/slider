<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset(''),
    'isQuiz'     => 1,
    'showTranscript' => 0,

    'questions'  => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => '1- What type of journey is this?',
            'options' => ['a beach vacation', 'a business trip', 'a city tour'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => '2- What does the speaker recommend bringing for a business trip?',
            'options' => ['Only clothes', 'Laptop, cell phone, and chargers', 'A book and snacks'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 17000,
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
        ['start' => 6,  'end' => 8,  'text' => 'No, this is my first time.'],
        ['start' => 8,  'end' => 12, 'text' => 'You should bring your laptop, cellphone, and chargers.'],
        ['start' => 12, 'end' => 14, 'text' => 'Any other advice?'],
        ['start' => 14, 'end' => 20, 'text' => "Bring a carry-on bag only, so you don't have to wait for your luggage."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])