<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-9/video/grocery-encrypted/grocery.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-9/video/thumbnail-grocery.webp'),

    'isQuiz' => 0,

    'questions' => [
        [
            'time' => 19000,
            'type' => 'multiple_choice',
            'question' => 'Where do you buy fruit and vegetables?',
            'options' => ['Bakery department', 'Produce department', 'Meat department'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'Milk, cheese, and eggs are in the ____ department.',
            'options' => ['Produce', 'Bakery', 'Dairy'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 46000,
            'type' => 'multiple_choice',
            'question' => 'Where do you buy fish and shellfish?',
            'options' => ['Meat department', 'Fish and seafood department', 'Central aisles'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 75000,
            'type' => 'multiple_choice',
            'question' => 'Bread is in the ____ department.',
            'options' => ['Bakery', 'Dairy', 'Produce'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 91000,
            'type' => 'multiple_choice',
            'question' => 'Where are the central aisles in the store?',
            'options' => ['Near the door', 'In the middle of the store', 'In the bakery'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => 'Learning about grocery store departments.'],
        ['start' => 4,  'end' => 9, 'text' => "Let's learn the names of the main grocery departments."],

        ['start' => 10, 'end' => 13, 'text' => 'What is a produce department?'],
        ['start' => 14, 'end' => 18, 'text' => 'The produce department is where you buy fruit and vegetables.'],
        ['start' => 18, 'end' => 22, 'text' => 'For example, apples are in the produce department.'],

        ['start' => 23, 'end' => 26, 'text' => 'What is a dairy department?'],
        ['start' => 27, 'end' => 31, 'text' => 'A dairy department is where you buy milk, cheese, and eggs.'],
        ['start' => 32, 'end' => 36, 'text' => 'For example, milk is in the dairy department.'],

        ['start' => 36, 'end' => 39, 'text' => 'What is a fish and seafood department?'],
        ['start' => 40, 'end' => 44, 'text' => 'A fish and seafood department is where you buy fish and shellfish.'],
        ['start' => 46, 'end' => 50, 'text' => 'For example, salmon is in the fish and seafood department.'],

        ['start' => 52, 'end' => 54, 'text' => 'What is a meat department?'],
        ['start' => 56, 'end' => 58, 'text' => 'A meat department is where you buy meat. '],
        ['start' => 59, 'end' => 62, 'text' => 'but the poultry department is where you buy chicken.'],

        ['start' => 63, 'end' => 65, 'text' => 'What is a bakery department?'],
        ['start' => 65, 'end' => 70,'text' => 'The bakery department is where you buy baked products made from flour.'],
        ['start' => 71,'end' => 75,'text' => 'For example, bread is in the bakery department.'],

        ['start' => 75,'end' => 77,'text' => 'What are the central aisles?'],
        ['start' => 78,'end' => 82,'text' => 'Central aisles are in the middle of the store.'],
        ['start' => 82.5,'end' => 86,'text' => 'Central aisles are where you buy prepared food.'],
        ['start' => 86.5,'end' => 91,'text' => 'For example, flowers are in the central aisles.'],

        ['start' => 91.5,'end' => 97,'text' => 'These are some of the main departments in the grocery store.'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])