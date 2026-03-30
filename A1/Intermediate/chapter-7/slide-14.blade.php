<?php
$content = [
    'video'          => materialAsset(''), // add video path
    'thumbnail'      => materialAsset(''), // add thumbnail path
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
        ['start' => 0,  'end' => 3,  'text' => 'Rose: Making plans…'],
        ['start' => 3,  'end' => 5,  'text' => 'Hi Sydney,'],
        ['start' => 5,  'end' => 8,  'text' => 'Here is the schedule for our trip.'],

        ['start' => 8,  'end' => 14, 'text' => 'On Monday we are going to arrive at the airport at 6:00 am.'],
        ['start' => 14, 'end' => 18, 'text' => 'Our flight leaves at 9:00 am.'],
        ['start' => 18, 'end' => 23, 'text' => 'On Monday evening we are going to have dinner with Cam and David.'],

        ['start' => 23, 'end' => 29, 'text' => 'On Tuesday we are going to have a tour of the city.'],
        ['start' => 29, 'end' => 34, 'text' => 'We are going to visit the museum and go sightseeing.'],
        ['start' => 34, 'end' => 39, 'text' => 'For dinner we’re going to go to a great Italian restaurant.'],

        ['start' => 39, 'end' => 45, 'text' => 'On Wednesday we’re going to go fishing on Cam’s boat.'],
        ['start' => 45, 'end' => 51, 'text' => 'We’re going to cook the fish on the beach in the evening.'],

        ['start' => 51, 'end' => 57, 'text' => 'On Thursday we’re going to watch a basketball game at the stadium.'],
        ['start' => 57, 'end' => 62, 'text' => 'David says we are going to have great seats.'],

        ['start' => 62, 'end' => 66, 'text' => 'On Friday we’re going to take a rest.'],
        ['start' => 66, 'end' => 69, 'text' => 'See you soon!'],
        ['start' => 69, 'end' => 71, 'text' => 'Rose'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])