<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-4/video/have-you-ever-encrypted/have-you-ever.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-4/img/slide5.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 10200,
            'type'           => 'multiple_choice',
            'question'       => '1. Has John ever been to Italy?',
            'options'        => [
                "No, he hasn't.",
                'Yes, he has.',
                'He wants to go.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 15200,
            'type'           => 'multiple_choice',
            'question'       => '2. Has John ever visited Ireland?',
            'options'        => [
                'Yes, he has.',
                "No, he hasn't.",
                'He is there now.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 21900,
            'type'           => 'multiple_choice',
            'question'       => '3. How many times has John eaten Sushi?',
            'options'        => [
                'Never.',
                'Only once.',
                'Many times.',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 27200,
            'type'           => 'multiple_choice',
            'question'       => '4. Has John ever played golf?',
            'options'        => [
                'No, he has never played.',
                'Yes, he plays every week.',
                "He doesn't like golf.",
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 3,  'text' => 'Lady: Hello John, can I ask you some questions?'],
        ['start' => 3,  'end' => 7,  'text' => 'John: Of course.'],

        ['start' => 7,  'end' => 8, 'text' => 'Lady: Have you been to Italy?'],
        ['start' => 8.5, 'end' => 10, 'text' => 'John: Yes, I have.'],

        ['start' => 11.8, 'end' => 13.5, 'text' => 'Lady: Have you ever been to Ireland?'],
        ['start' => 13.8,   'end' => 15, 'text' => "John: No, I haven't."],

        ['start' => 16.8, 'end' => 19, 'text' => 'Lady: Have you ever eaten Sushi?'],
        ['start' => 19,   'end' => 21.8, 'text' => 'John: Yes, I have, many times.'],

        ['start' => 21.8, 'end' => 24, 'text' => 'Lady: Have you ever played golf?'],
        ['start' => 24,   'end' => 27, 'text' => 'John: No, I have never played golf.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])