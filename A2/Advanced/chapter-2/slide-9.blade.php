<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-2/video/unusual-jobs-encrypted/unusual-jobs.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-2/img/slide9.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 26200,
            'type'           => 'multiple_choice',
            'question'       => 'What does a professional sleeper do?',
            'options'        => [
                'Travels to different places',
                'Tests beds by sleeping',
                'Cooks food',
                'Works at funerals',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 38000,
            'type'           => 'multiple_choice',
            'question'       => 'Why do people taste pet food?',
            'options'        => [
                'To sell it',
                'To make it look nice',
                'To check if it is good and healthy',
                'To give it to animals',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 51200,
            'type'           => 'multiple_choice',
            'question'       => 'What does a water slide tester do?',
            'options'        => [
                'Builds water slides',
                'Cleans water slides',
                'Tries and rates water slides',
                'Sells tickets',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 58700,
            'type'           => 'multiple_choice',
            'question'       => 'Where does a professional mourner work?',
            'options'        => [
                'At a hospital',
                'At a restaurant',
                'At a school',
                'At funerals',
            ],
            'correct_answer' => 3,
            'points'         => 1,
        ],
        [
            'time'           => 66300,
            'type'           => 'multiple_choice',
            'question'       => 'What is the main idea of the text?',
            'options'        => [
                'Normal jobs are better',
                'Unusual jobs can be interesting and real',
                'Jobs are always difficult',
                'People should not work',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 2,  'text' => 'You should think about your job again.'],
        ['start' => 2.5,  'end' => 9, 'text' => 'Imagine waking up and working as a professional sleeper, or testing water slides for your job.'],
        ['start' => 9.5, 'end' => 11, 'text' => 'Are you curious? '],
        ['start' => 12, 'end' => 14.5, 'text' => 'Let’s look at some unusual jobs.'],
        ['start' => 15.5, 'end' => 18, 'text' => 'First, a professional sleeper.'],
        ['start' => 20, 'end' => 23, 'text' => 'Companies pay people to sleep and test beds.'],
        ['start' => 23.5, 'end' => 26, 'text' => 'They check if the beds are comfortable.'],

        ['start' => 28.7, 'end' => 30.5, 'text' => 'Next, a pet food taster.'],
        ['start' => 32, 'end' => 34, 'text' => 'These people taste pet food.'],
        ['start' => 34.5, 'end' => 38, 'text' => 'They check if the food is good and healthy for animals.'],

        ['start' => 38, 'end' => 44, 'text' => 'Now, for exciting jobs: a water slide tester.'],
        ['start' => 44.7, 'end' => 48, 'text' => 'They travel to different places and try water slides.'],
        ['start' => 48, 'end' => 51, 'text' => 'They say which slides are the best.'],

        ['start' => 52, 'end' => 54, 'text' => 'Finally, a professional mourner.'],
        ['start' => 55, 'end' => 58.5, 'text' => 'These people go to funerals and show sadness.'],

        ['start' => 59.5, 'end' => 63, 'text' => 'So, when you think about your future job,'],
        ['start' => 63, 'end' => 66, 'text' => 'maybe try something different and unusual.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])