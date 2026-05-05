<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide15.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 8,
            'type'           => 'multiple_choice',
            'question'       => 'Choose the correct options. Does Samantha like her job?',
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
            'time'           => 18,
            'type'           => 'multiple_choice',
            'question'       => 'Choose the correct options. What does she like about her job?',
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
            'time'           => 29,
            'type'           => 'multiple_choice',
            'question'       => "Choose the correct options. Which of the things below doesn't she like about her job?",
            'options'        => [
                'waking up early',
                'her boss',
                'the students',
                'correcting homework',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 41,
            'type'           => 'multiple_choice',
            'question'       => 'Choose the correct options. How does she describe the principal?',
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
            'time'           => 53,
            'type'           => 'multiple_choice',
            'question'       => "Choose the correct options. Does Tony think that she's satisfied overall with her job?",
            'options'        => [
                'Yes',
                'No',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
    ],

    'subtitles' => [],
];
?>

@include("slider.video.interactive", ['content' => $content])