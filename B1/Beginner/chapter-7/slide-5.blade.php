<?php

$content = [
    'video'     => materialAsset('slider/B1/Beginner/chapter-7/videos/'),
    'thumbnail' => materialAsset('slider/B1/Beginner/chapter-7/img/slide5.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'time' => 15000,
            'type' => 'multiple_choice',
            'question' => 'Why does the man wish he had taken a different route?',
            'options' => [
                'He is late for work.',
                'He is in a traffic jam.',
                'He forgot his wallet.',
                'His car broke down.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 31000,
            'type' => 'multiple_choice',
            'question' => 'Why does the woman wish she had a seat?',
            'options' => [
                'She is hungry.',
                'She is cold.',
                'She is tired.',
                'She is sick.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 39000,
            'type' => 'multiple_choice',
            'question' => 'What does the woman wish the man in front of her was wearing?',
            'options' => [
                'A hat',
                'Glasses',
                'A jacket',
                'Headphones',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
        [
            'time' => 68000,
            'type' => 'multiple_choice',
            'question' => 'What does the homeless man thank the woman for?',
            'options' => [
                'Giving him money',
                'Buying him something to eat',
                'Giving him an umbrella',
                'Taking him home',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 89000,
            'type' => 'multiple_choice',
            'question' => 'What happens at the end of the script?',
            'options' => [
                'It starts snowing.',
                'The bus arrives.',
                'It starts raining.',
                'They go home.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 2.5,  'text' => 'Morning, Bill!'],
        ['start' => 3,    'end' => 6,    'text' => 'I wish I had a car like that.'],
        ['start' => 6.5,  'end' => 10.5, 'text' => 'I wish you would stop dreaming and mow the lawn like you said!'],

        ['start' => 12,   'end' => 14,   'text' => 'Oh no, a traffic jam!'],
        ['start' => 14.5, 'end' => 18,   'text' => 'I wish I had taken a different route.'],
        ['start' => 18.5, 'end' => 21,   'text' => 'I can’t see anything.'],
        ['start' => 21.5, 'end' => 25,   'text' => 'I wish I wasn’t stuck behind this bus!'],

        ['start' => 26.5, 'end' => 29.5, 'text' => 'I wish I didn’t have to take the bus.'],
        ['start' => 30,   'end' => 31.5, 'text' => 'I’m tired.'],
        ['start' => 32,   'end' => 34.5, 'text' => 'I wish I had a seat.'],
        ['start' => 35,   'end' => 39,   'text' => 'I wish this guy were wearing headphones.'],
        ['start' => 39.5, 'end' => 42,   'text' => 'I wish I could play the guitar.'],

        ['start' => 44,   'end' => 48,   'text' => 'I wish I spent more time with my grandchildren.'],
        ['start' => 48.5, 'end' => 51.5, 'text' => 'Well, I’m going to call them today!'],

        ['start' => 53,   'end' => 55,   'text' => 'Mom just called.'],
        ['start' => 55.5, 'end' => 58,   'text' => 'We have to go home now.'],
        ['start' => 58.5, 'end' => 62,   'text' => 'I wish we didn’t have to go home so early!'],

        ['start' => 63.5, 'end' => 66,   'text' => 'I wish I had a home.'],
        ['start' => 66.5, 'end' => 68,   'text' => 'Poor man!'],
        ['start' => 68.5, 'end' => 71.5, 'text' => 'I wish I could help him somehow.'],
        ['start' => 72,   'end' => 73.5, 'text' => 'I know!'],
        ['start' => 74,   'end' => 77,   'text' => 'I’ll buy him something to eat.'],
        ['start' => 77.5, 'end' => 80,   'text' => 'Homeless: Thank you, ma’am!'],
        ['start' => 80.5, 'end' => 84,   'text' => 'I wish more people were as kind as you!'],

        ['start' => 85.5, 'end' => 88,   'text' => 'I wish I could have an ice cream.'],
        ['start' => 88.5, 'end' => 90,   'text' => 'But no!'],
        ['start' => 90.5, 'end' => 92,   'text' => 'Not today!'],

        ['start' => 93.5, 'end' => 96,   'text' => 'Oh no, it’s starting to rain!'],
        ['start' => 96.5, 'end' => 100,  'text' => 'I wish we had brought an umbrella!'],
        ['start' => 100.5,'end' => 104,  'text' => 'I wish I hadn’t brought this stupid umbrella!'],
        ['start' => 104.5,'end' => 107,  'text' => 'I wish it would stop raining!'],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])