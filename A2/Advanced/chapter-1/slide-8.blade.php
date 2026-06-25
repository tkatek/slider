<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/videos/roles-encrypted/roles.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 7600,
            'type'           => 'multiple_choice',
            'question'       => 'Who is the head of design?',
            'options'        => [
                'Paul',
                'Emir',
                'Vanya',
                'Patrick',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 12100,
            'type'           => 'multiple_choice',
            'question'       => 'What does Paul do?',
            'options'        => [
                'He manages artists',
                'He works in social media',
                'He produces content',
                'He teaches English',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 16200,
            'type'           => 'multiple_choice',
            'question'       => 'What does Paul say he is responsible for?',
            'options'        => [
                'Writing',
                'Filming',
                'Marketing',
                'Editing',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 23200,
            'type'           => 'multiple_choice',
            'question'       => 'What is Vanya’s job?',
            'options'        => [
                'Design',
                'Social media and marketing',
                'Writing',
                'Training',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 26700,
            'type'           => 'multiple_choice',
            'question'       => 'Does Vanya like her job?',
            'options'        => [
                'Yes',
                'No',
                'Sometimes',
                'Not sure',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0, 'end' => 2.5,  'text' => "Patrick: what's your role in the company?"],
        ['start' => 3, 'end' => 7.5,  'text' => "Emir: I'm the head of design. I manage artists and graphic designers."],

        ['start' => 8, 'end' => 10,  'text' => 'Patrick: Good. What about you?'],
        ['start' => 10, 'end' => 12,  'text' => "Paul: I'm a content producer."],

        ['start' => 12.7, 'end' => 14,  'text' => 'Patrick: What does that mean?'],
        ['start' => 14, 'end' => 16,  'text' => "Paul: It means I'm responsible for writing."],

        ['start' => 18, 'end' => 20.5,  'text' => 'Patrick: Nice. And you – what do you do?'],
        ['start' => 21, 'end' => 23,  'text' => 'Vanya: Social media and marketing.'],

        ['start' => 23.5, 'end' => 25,  'text' => 'Patrick: Do you like your job?'],
        ['start' => 25, 'end' => 26.5,  'text' => 'Vanya: Yeah, I love it!'],

        ['start' => 27.5, 'end' => 33,  'text' => "Patrick: What's the best part of your job? And two: Do you like the people you work with?"],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
