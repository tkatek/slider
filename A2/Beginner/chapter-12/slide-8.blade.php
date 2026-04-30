<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Lesson 3: My Food Pyramid',
    'subtitle'   => 'Watch again & do the quiz',

    'video'     => materialAsset('slider/A2/Beginner/chapter-10/video/encrypted/slide-5.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-10/img/slide-5.webp'),

    'isQuiz'         => 1,
    'showCC'         => false,
    'showTranscript' => false,

    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => '1. What are fruits and vegetables rich in?',
            'options' => [
                'Sugar only',
                'Vitamins, minerals, and fiber',
                'Fat only',
                'Salt',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => '2. What does fiber help with?',
            'options' => [
                'Sleeping',
                'Digestion',
                'Hearing',
                'Running fast',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => '3. Which nutrient helps your body fight illness?',
            'options' => [
                'Vitamins',
                'Sugar',
                'Salt',
                'Oil',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => '4. What do minerals help with?',
            'options' => [
                'Watching TV',
                'Keeping the body healthy',
                'Playing games',
                'Driving',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 20000,
            'type' => 'multiple_choice',
            'question' => '5. Which food group gives you many vitamins and minerals?',
            'options' => [
                'Sweets',
                'Fast food',
                'Fruits and vegetables',
                'Chips',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'Let’s watch this video.'],

        ['start' => 4,  'end' => 8,  'text' => 'What are food groups?'],

        ['start' => 8,  'end' => 12, 'text' => 'How many food groups do we have?'],

        ['start' => 12, 'end' => 23, 'text' => 'Eating a variety of foods from all five food groups is important for good health because it gives your body many important nutrients.'],

        ['start' => 23, 'end' => 25, 'text' => 'Let’s take a closer look at all five food groups.'],

        ['start' => 25, 'end' => 39, 'text' => 'First is grains. Bread, cereal, pasta, rice, and other grains like oats and barley are all grains. They give your body energy.'],

        ['start' => 39, 'end' => 59, 'text' => 'Second is protein. Meat, fish, eggs, tofu, beans, nuts, and seeds are protein foods. They help build and repair your body and keep you healthy.'],

        ['start' => 59, 'end' => 69, 'text' => 'Third is vegetables. Carrots, peppers, broccoli, cabbage, beets, and leafy greens are vegetables.'],

        ['start' => 69, 'end' => 93, 'text' => 'Fourth is fruits. Apples, oranges, berries, mango, and pineapple are fruits. Fruits and vegetables are full of vitamins and help keep your body strong and healthy.'],

        ['start' => 93, 'end' => 100, 'text' => 'Finally, dairy. Milk, cheese, and yogurt give you calcium for strong bones and teeth.'],

        ['start' => 100, 'end' => 110, 'text' => 'To stay healthy, eat foods from all five groups every day: grains, protein, vegetables, fruits, and dairy.'],
    ],

    'transcript' => [],
];
?>

@include('slider.video.interactive', ['content' => $content])