<?php
$content = [
    'video'          => materialAsset('slider/A1/Intermediate/chapter-7/video/planning-a-trip-encrypted/planning-a-trip.m3u8'), // add video path
    'thumbnail'      => materialAsset('slider/A1/Intermediate/chapter-7/img/slide14.webp'), // add thumbnail path
    'isQuiz'         => 1,
    'showTranscript' => 0,

    'questions'      => [
        [
            'time' => 9000,
            'type' => 'multiple_choice',
            'question' => 'Choose the correct sentence:',
            'options' => [
                'I going to travel.',
                "I’m going to travel.",
                'I go to travel.',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => 'Complete the sentence: I’m going to _____ a hotel.',
            'options' => [
                'book',
                'booked',
                'booking',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            'time' => 29000,
            'type' => 'multiple_choice',
            'question' => 'Choose the correct question:',
            'options' => [
                'Where you going?',
                'Where are you going?',
                'Where you are going?',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 39000,
            'type' => 'multiple_choice',
            'question' => 'Complete the sentence: She is going to _____ her friends.',
            'options' => [
                'visits',
                'visit',
                'visited',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [

        ['start' => 0,  'end' => 1,  'text' => 'Hi Sydney,'],
        ['start' => 1,  'end' => 3,  'text' => 'Here is the schedule for our trip.'],

        ['start' => 4.5,  'end' => 8, 'text' => 'On Monday we are going to arrive at the airport at 6:00 am.'],
        ['start' => 10.7, 'end' => 1.5, 'text' => 'Our flight leaves at 9:00 am.'],
        ['start' => 14.5, 'end' => 19, 'text' => 'On Monday evening we are going to have dinner with Cam and David.'],

        ['start' => 19.5, 'end' => 23, 'text' => 'On Tuesday we are going to have a tour of the city.'],
        ['start' => 23, 'end' => 26, 'text' => 'We are going to visit the museum and go sightseeing.'],
        ['start' => 29, 'end' => 32.5, 'text' => 'For dinner we’re going to go to a great Italian restaurant.'],

        ['start' => 33, 'end' => 37, 'text' => 'On Wednesday we’re going to go fishing on Cam’s boat.'],
        ['start' => 37, 'end' => 40.5, 'text' => 'We’re going to cook the fish on the beach in the evening.'],

        ['start' => 41, 'end' => 44, 'text' => 'On Thursday we’re going to watch a basketball game at the stadium.'],
        ['start' => 46.7, 'end' => 50, 'text' => 'David says we are going to have great seats.'],

        ['start' => 50, 'end' => 53, 'text' => 'On Friday we’re going to take a rest.'],
        ['start' => 54, 'end' => 56, 'text' => 'See you soon!'],

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])