<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-4/img/slide4.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time'           => 12.5,
            'type'           => 'multiple_choice',
            'question'       => '1. Has John ever been to Italy?',
            'options'        => [
                "No, he hasn't.",
                'Yes, he has.',
                'He wants to go.',
            ],
            'correct_answer' => 'Yes, he has.',
            'points'         => 1,
        ],
        [
            'time'           => 16.5,
            'type'           => 'multiple_choice',
            'question'       => '2. Has John ever visited Ireland?',
            'options'        => [
                'Yes, he has.',
                "No, he hasn't.",
                'He is there now.',
            ],
            'correct_answer' => "No, he hasn't.",
            'points'         => 1,
        ],
        [
            'time'           => 21.5,
            'type'           => 'multiple_choice',
            'question'       => '3. How many times has John eaten Sushi?',
            'options'        => [
                'Never.',
                'Only once.',
                'Many times.',
            ],
            'correct_answer' => 'Many times.',
            'points'         => 1,
        ],
        [
            'time'           => 24.5,
            'type'           => 'multiple_choice',
            'question'       => '4. Has John ever played golf?',
            'options'        => [
                'No, he has never played.',
                'Yes, he plays every week.',
                "He doesn't like golf.",
            ],
            'correct_answer' => 'No, he has never played.',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 3,  'text' => 'Lady: Hello John, can I ask you some questions?'],
        ['start' => 3,  'end' => 7,  'text' => 'John: Of course.'],

        ['start' => 7,  'end' => 12, 'text' => 'Lady: Have you been to Italy?'],
        ['start' => 12, 'end' => 12.8, 'text' => 'John: Yes, I have.'],

        ['start' => 12.8, 'end' => 16, 'text' => 'Lady: Have you ever been to Ireland?'],
        ['start' => 16,   'end' => 16.8, 'text' => "John: No, I haven't."],

        ['start' => 16.8, 'end' => 21, 'text' => 'Lady: Have you ever eaten Sushi?'],
        ['start' => 21,   'end' => 21.8, 'text' => 'John: Yes, I have, many times.'],

        ['start' => 21.8, 'end' => 24, 'text' => 'Lady: Have you ever played golf?'],
        ['start' => 24,   'end' => 27, 'text' => 'John: No, I have never played golf.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])