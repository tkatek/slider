<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-1/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-1/video/'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Where does the passenger want to go?',
            'options' => ['The airport', 'The main station', 'The hotel', 'The bus stop'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Why is the passenger going there?',
            'options' => ['To meet a friend', 'To go shopping', 'To catch a train', 'To eat at a restaurant'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 29000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: How much is the taxi ride?',
            'options' => ['$10', '$14.25', '$15 exactly', '$20'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 33000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: How does the passenger pay?',
            'options' => ['By card', 'By cheque', 'With $15 cash', 'With coins'],
            'correct_answer' => 3,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 3, 'text' => 'Passenger: Hi. Can you take me to main station?'],
        ['start' => 3, 'end' => 5, 'text' => 'Driver: Sure, let’s go.'],
        ['start' => 5, 'end' => 8, 'text' => 'Passenger: Can we get there before 6:00?'],
        ['start' => 8, 'end' => 12, 'text' => 'Driver: Yes, we can. Traffic is not bad right now.'],
        ['start' => 12, 'end' => 15, 'text' => 'Passenger: I’m going there to catch a train.'],
        ['start' => 15, 'end' => 19, 'text' => 'Driver: Got it. I’ll get you there quickly and safely.'],
        ['start' => 19, 'end' => 22, 'text' => 'Passenger: That’s good. How much is the ride?'],
        ['start' => 22, 'end' => 25, 'text' => 'Driver: It’s usually around $15.'],
        ['start' => 25, 'end' => 28, 'text' => 'Passenger: Do you take credit cards?'],
        ['start' => 28, 'end' => 31, 'text' => 'Driver: Yes, I take both cards and cash.'],
        ['start' => 31, 'end' => 33, 'text' => 'Passenger: Great. Let’s go.'],
        ['start' => 33, 'end' => 35, 'text' => 'Driver: We have arrived.'],
        ['start' => 35, 'end' => 37, 'text' => 'Passenger: How much is it?'],
        ['start' => 37, 'end' => 40, 'text' => 'Driver: It’s 14.25. A bit less than usual.'],
        ['start' => 40, 'end' => 43, 'text' => 'Passenger: Perfect. Here’s $15. Keep the change.'],
        ['start' => 43, 'end' => 46, 'text' => 'Driver: Thank you. Have a great trip.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])