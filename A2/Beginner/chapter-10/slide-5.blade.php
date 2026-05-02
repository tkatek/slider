<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => "Watch again & do the quiz",
    'subtitle' => "Healthy Habits",

    'video' => materialAsset('slider/A2/Beginner/chapter-10/video/bodies-encrypted/bodies.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-10/img/slide5.webp'),


    'isQuiz' => 0,

    'questions' => [
        [
            'time' => 9700,
            'type' => 'multiple_choice',
            'question' => '1. Why is exercise important?',
            'options' => [
                'It makes us sleepy',
                'It helps build muscles and gives us energy',
                'It makes us hungry',
                'It helps us watch TV',
            ],
            'correct_answer' => 1,
            'points' => 1,
        ],
        [
            'time' => 17500,
            'type' => 'multiple_choice',
            'question' => '2. Which of the following is a healthy food?',
            'options' => [
                'Candy',
                'Chips',
                'Fruits and vegetables',
                'Soda',
            ],
            'correct_answer' => 2,
            'points' => 1,
        ],
        [
            'time' => 20600,
            'type' => 'multiple_choice',
            'question' => '3. Why do we need to drink water?',
            'options' => [
                'To feel tired',
                'To stay hydrated',
                'To avoid eating',
                'To sleep more',
            ],
            'correct_answer' => 1,
            'points' => 1,
        ],
        [
            'time' => 25200,
            'type' => 'multiple_choice',
            'question' => '4. What does sleep help our bodies do?',
            'options' => [
                'Run faster',
                'Eat more',
                'Rest and grow',
                'Watch TV',
            ],
            'correct_answer' => 2,
            'points' => 1,
        ],
        [
            'time' => 31700,
            'type' => 'multiple_choice',
            'question' => '5. Which of these is an example of good personal hygiene?',
            'options' => [
                'Playing games',
                'Watching TV',
                'Washing hands and brushing teeth',
                'Eating candy',
            ],
            'correct_answer' => 2,
            'points' => 1,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 4.5, 'text' => 'Our bodies need care every day to stay strong and healthy.'],
        ['start' => 4.5, 'end' => 9.7, 'text' => 'Exercise helps us build muscles, keep our hearts strong, and gives us energy.'],
        ['start' => 9.7, 'end' => 17.5, 'text' => 'Eating healthy foods like fruits, vegetables, proteins, and whole grains gives our bodies the nutrients they need.'],
        ['start' => 17.5, 'end' => 20.5, 'text' => 'Drinking water is important to keep us hydrated.'],
        ['start' => 20.7, 'end' => 25, 'text' => 'Getting enough sleep helps our brains and bodies rest and grow.'],
        ['start' => 25.5, 'end' => 31.5, 'text' => 'Personal hygiene, like washing hands, brushing teeth, and keeping clean, protects us from germs.'],
        ['start' => 32, 'end' => 37, 'text' => 'Healthy habits make us feel good, think better, and live longer.'],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])