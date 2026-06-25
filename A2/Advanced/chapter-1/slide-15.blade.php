<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/videos/jobs-encrypted/jobs.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide15.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 7600,
            'type'           => 'multiple_choice',
            'question'       => 'Does Samantha like her job?',
            'options'        => [
                'She dislikes everything',
                "She doesn't like her job",
                'She likes many things and dislikes some things',
                'She loves everything about her job',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 19000,
            'type'           => 'multiple_choice',
            'question'       => 'What does she like about her job?',
            'options'        => [
                'co-workers',
                'teaching students',
                'correcting homework',
                'all of the above',
            ],
            'correct_answer' => 3,
            'points'         => 1,
        ],
        [
            'time'           => 30600,
            'type'           => 'multiple_choice',
            'question'       => "Which of the things below doesn't she like about her job?",
            'options'        => [
                'waking up early',
                'preparing for classes',
                'the students',
                'correcting homework',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 41600,
            'type'           => 'multiple_choice',
            'question'       => 'How does she describe the principal?',
            'options'        => [
                'A pushover and helpful',
                'Strict and helpful',
                'Mean and rude',
                'Loud and annoying',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 41700,
            'type'           => 'multiple_choice',
            'question'       => "Does Tony think that she's satisfied overall with her job?",
            'options'        => [
                'Yes',
                'No',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0, 'end' => 2,  'text' => "Do you like your job Samantha"],
        ['start' => 2, 'end' => 7.5,  'text' => "I like many things about my job but there is somethings that i don't like"],

        ['start' => 8, 'end' => 10,  'text' => 'What do you like about your job?'],
        ['start' => 10, 'end' => 14,  'text' => "I like my co-workers and i don't mind preparing for my classes"],

        ['start' => 14, 'end' => 18.7,  'text' => 'I love to teach my students and i even like to correct homework and assignments'],
        ['start' => 20, 'end' => 23.5,  'text' => "Emm very interesting, what don't you like about your job?"],

        ['start' => 24, 'end' => 26,  'text' => "I don't like to work overtime" ],
        ['start' => 26, 'end' => 30.5,  'text' => "I don't like it when my students misbehave, I don't like waking up early"],

        ['start' => 31, 'end' => 38.5,  'text' => "And sometimes i don't like my boss, our principle Mr Scott is very strict but sometimes he's very helpful too" ],
        ['start' => 38.7, 'end' => 41.5,  'text' => 'It sounds like overall you are happy with your job'],

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])