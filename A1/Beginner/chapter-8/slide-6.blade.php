<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-8/video/encrypted/transport.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-8/video/transport.webp'),

    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 34000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: In American English, what do they call a "motorbike"?',
            'options' => ['Scooter', 'Motorcycle', 'Bike', 'Moped'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Which of these is not a form of transportation?',
            'options' => ['Scooter', 'Bicycle', 'Skateboard', 'SUV'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 66000,
            'type' => 'multiple_choice',
            'question' => "Question 3: If you're going to work using the bus, how can you say it?",
            'options' => ['I go on bus.', 'I go by bus.', 'I go in bus.', 'I go with bus.'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 77000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: If you walk to the supermarket, how would you express that?',
            'options' => ['I go by foot.', 'I go with foot.', 'I go on foot.', 'I go to foot.'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 103000,
            'type' => 'multiple_choice',
            'question' => 'Question 5: You use "get on" with......',
            'options' => ['A car', 'A taxi', 'A motorcycle', 'An SUV'],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 1.5,  'text' => 'Transport.'],
        ['start' => 1.5,  'end' => 4,  'text' => "Let's learn some common forms of transportation."],
        ['start' => 5.5,  'end' => 9.5,  'text' => 'This is a plane,'],
        ['start' => 9.5,  'end' => 11.5, 'text' => 'a train,'],
        ['start' => 12, 'end' => 14, 'text' => 'a car,'],
        ['start' => 15, 'end' => 18, 'text' => 'an SUV,'],
        ['start' => 18.5, 'end' => 21, 'text' => 'a bike,'],
        ['start' => 21.5, 'end' => 24, 'text' => 'a scooter,'],
        ['start' => 24.5, 'end' => 31, 'text' => 'a motorcycle in American English, or a motorbike in British English,'],
        ['start' => 31, 'end' => 33.5, 'text' => 'a boat,'],
        ['start' => 34, 'end' => 37, 'text' => 'a ship,'],
        ['start' => 38, 'end' => 40, 'text' => 'a taxi,'],
        ['start' => 41, 'end' => 43, 'text' => 'a bus,'],
        ['start' => 44.5, 'end' => 50, 'text' => 'a subway in American English, or a metro in British English.'],

        ['start' => 51, 'end' => 56, 'text' => 'When we go somewhere using any of these forms of transport, we say by. '],
        ['start' => 57, 'end' => 62, 'text' => 'How do you go to work? I go by bus.'],
        ['start' => 62, 'end' => 66, 'text' => 'How do you go to school? I go by bike.'],

        ['start' => 68, 'end' => 72, 'text' => 'When we walk somewhere, we can say on foot.'],
        ['start' => 72, 'end' => 74, 'text' => 'How do you go to the supermarket?'],
        ['start' => 74, 'end' => 77, 'text' => 'I go on foot.'],

        ['start' => 78, 'end' => 80, 'text' => 'Get in or get on. '],
        ['start' => 80, 'end' => 86, 'text' => 'Remember that if you can stand on the form of transport, we say get on.'],
        ['start' => 86.5, 'end' => 92, 'text' => 'For example, we can get on a plane, a boat, a train, a motorcycle.'],

        ['start' => 92,'end' => 98,'text' => "If you can't stand on the form of transport, we say get in."],
        ['start' => 98,'end' => 103,'text' => 'We can get in a car, a taxi, or an SUV.'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])