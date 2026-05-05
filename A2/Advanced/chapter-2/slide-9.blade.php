<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-2/img/slide9.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 32,
            'type'           => 'multiple_choice',
            'question'       => 'What does a professional sleeper do?',
            'options'        => [
                'Travels to different places',
                'Tests beds by sleeping',
                'Cooks food',
                'Works at funerals',
            ],
            'correct_answer' => 'Tests beds by sleeping',
            'points'         => 1,
        ],
        [
            'time'           => 48,
            'type'           => 'multiple_choice',
            'question'       => 'Why do people taste pet food?',
            'options'        => [
                'To sell it',
                'To make it look nice',
                'To check if it is good and healthy',
                'To give it to animals',
            ],
            'correct_answer' => 'To check if it is good and healthy',
            'points'         => 1,
        ],
        [
            'time'           => 64,
            'type'           => 'multiple_choice',
            'question'       => 'What does a water slide tester do?',
            'options'        => [
                'Builds water slides',
                'Cleans water slides',
                'Tries and rates water slides',
                'Sells tickets',
            ],
            'correct_answer' => 'Tries and rates water slides',
            'points'         => 1,
        ],
        [
            'time'           => 78,
            'type'           => 'multiple_choice',
            'question'       => 'Where does a professional mourner work?',
            'options'        => [
                'At a hospital',
                'At a restaurant',
                'At a school',
                'At funerals',
            ],
            'correct_answer' => 'At funerals',
            'points'         => 1,
        ],
        [
            'time'           => 92,
            'type'           => 'multiple_choice',
            'question'       => 'What is the main idea of the text?',
            'options'        => [
                'Normal jobs are better',
                'Unusual jobs can be interesting and real',
                'Jobs are always difficult',
                'People should not work',
            ],
            'correct_answer' => 'Unusual jobs can be interesting and real',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 5,  'text' => 'You should think about your job again.'],
        ['start' => 5,  'end' => 12, 'text' => 'Imagine waking up and working as a professional sleeper, or testing water slides for your job.'],
        ['start' => 12, 'end' => 17, 'text' => 'Are you curious? Let’s look at some unusual jobs.'],

        ['start' => 17, 'end' => 21, 'text' => 'First, a professional sleeper.'],
        ['start' => 21, 'end' => 27, 'text' => 'Companies pay people to sleep and test beds.'],
        ['start' => 27, 'end' => 32, 'text' => 'They check if the beds are comfortable.'],

        ['start' => 32, 'end' => 36, 'text' => 'Next, a pet food taster.'],
        ['start' => 36, 'end' => 41, 'text' => 'These people taste pet food.'],
        ['start' => 41, 'end' => 48, 'text' => 'They check if the food is good and healthy for animals.'],

        ['start' => 48, 'end' => 53, 'text' => 'Now, for exciting jobs: a water slide tester.'],
        ['start' => 53, 'end' => 60, 'text' => 'They travel to different places and try water slides.'],
        ['start' => 60, 'end' => 64, 'text' => 'They say which slides are the best.'],

        ['start' => 64, 'end' => 69, 'text' => 'Finally, a professional mourner.'],
        ['start' => 69, 'end' => 78, 'text' => 'These people go to funerals and show sadness.'],

        ['start' => 78, 'end' => 84, 'text' => 'So, when you think about your future job,'],
        ['start' => 84, 'end' => 92, 'text' => 'maybe try something different and unusual.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])