<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Watch Again & Do the Quiz',

    'video'     => materialAsset('slider/A2/Beginner/chapter-10/video/encrypted/slide-5.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-10/img/slide-5.webp'),

    'isQuiz'         => 1,
    'showCC'         => false,
    'showTranscript' => false,

    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => '1. Why is exercise important?',
            'options' => [
                'It makes us sleepy',
                'It helps build muscles and gives us energy',
                'It makes us hungry',
                'It helps us watch TV',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => '2. Which of the following is a healthy food?',
            'options' => [
                'Candy',
                'Chips',
                'Fruits and vegetables',
                'Soda',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => '3. Why do we need to drink water?',
            'options' => [
                'To feel tired',
                'To stay hydrated',
                'To avoid eating',
                'To sleep more',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => '4. What does sleep help our bodies do?',
            'options' => [
                'Run faster',
                'Eat more',
                'Rest and grow',
                'Watch TV',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 20000,
            'type' => 'multiple_choice',
            'question' => '5. Which of these is an example of good personal hygiene?',
            'options' => [
                'Playing games',
                'Watching TV',
                'Washing hands and brushing teeth',
                'Eating candy',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles'  => [],
    'transcript' => [],
];
?>

@include('slider.video.interactive', ['content' => $content])