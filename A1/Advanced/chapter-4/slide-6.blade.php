<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-4/video/taxi-ride-encrypted/taxi-ride.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-4/img/taxi-ride.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 5300,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Where does the passenger want to go?',
            'options' => ['The airport', 'The main station', 'The hotel', 'The bus stop'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [

            'time' => 16700,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Why is the passenger going there?',
            'options' => ['To meet a friend', 'To go shopping', 'To catch a train', 'To eat at a restaurant'],
            'correct_answer' => 2,
            'points' => 10
        ],[

            'time' => 45500,
            'type' => 'multiple_choice',
            'question' => 'Question 3: How much is the taxi ride?',
            'options' => ['$10', '$14.25', '$15 exactly', '$20'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [

            'time' => 49200,
            'type' => 'multiple_choice',
            'question' => 'Question 4: How does the passenger pay?',
            'options' => ['By card', 'By cheque', 'With $15 cash', 'With coins'],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 3, 'text' => 'Passenger: Hi. Can you take me to main station?'],
        ['start' => 3, 'end' => 5, 'text' => 'Driver: Sure, let’s go.'],
        ['start' => 6, 'end' => 8, 'text' => 'Passenger: Can we get there before 6:00?'],
        ['start' => 8.7, 'end' => 12, 'text' => 'Driver: Yes, we can. Traffic is not bad right now.'],
        ['start' => 12, 'end' => 14, 'text' => 'Passenger: I’m going there to catch a train.'],
        ['start' => 14, 'end' => 16.5, 'text' => 'Driver: Got it. I’ll get you there quickly and safely.'],
        ['start' => 17, 'end' => 19, 'text' => 'Passenger: That’s good. How much is the ride?'],
        ['start' => 20, 'end' => 22, 'text' => 'Driver: It’s usually around $15.'],
        ['start' => 23.8, 'end' => 25, 'text' => 'Passenger: Do you take credit cards?'],
        ['start' => 25.8, 'end' => 27.5, 'text' => 'Driver: Yes, I take both cards and cash.'],
        ['start' => 28.5, 'end' => 30, 'text' => 'Passenger: Great. Let’s go.'],
        ['start' => 39.5, 'end' => 40.5, 'text' => 'Driver: We have arrived.'],
        ['start' => 40.8, 'end' => 42, 'text' => 'Passenger: How much is it?'],
        ['start' => 42, 'end' => 45.5, 'text' => 'Driver: It’s 14.25. A bit less than usual.'],
        ['start' => 45.5, 'end' => 47.7, 'text' => 'Passenger: Perfect. Here’s $15. Keep the change.'],
        ['start' => 47.7, 'end' => 49, 'text' => 'Driver: Thank you. Have a great trip.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])