<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-2/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-2/img/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'Rice and miso soup are eaten in Japan for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => 'Bread rolls and sausages are eaten in Mexico for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 29000,
            'type' => 'multiple_choice',
            'question' => 'Grilled tomatoes and eggs are eaten in the United Kingdom.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 47000,
            'type' => 'multiple_choice',
            'question' => 'Tortillas and beans are eaten in Australia for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'What is eaten in India?',
            'options' => ['Rice and soup', 'Dosa, sambar and chutney', 'Bread and eggs', 'Fruit and toast'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'What is eaten in Russia?',
            'options' => ['Tortillas and beans', 'Pancakes and bacon', 'Rye bread, porridge and sausage', 'Corn flakes and milk'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'This is what breakfast looks like around the world.'],
        ['start' => 4,  'end' => 9,  'text' => 'So in the United States we eat pancakes, eggs and bacon.'],
        ['start' => 9,  'end' => 12, 'text' => 'White rice, miso soup and pickled vegetables are eaten in Japan.'],
        ['start' => 12, 'end' => 15, 'text' => 'In India, dosa, sambar and chutney are eaten for breakfast.'],
        ['start' => 15, 'end' => 18, 'text' => 'Germany eats a bread roll, hard-boiled eggs and sausages.'],
        ['start' => 18, 'end' => 23, 'text' => 'Brazilians eat fruit, toast and ham.'],
        ['start' => 23, 'end' => 29, 'text' => 'The United Kingdom opts for sausages, grilled tomatoes, eggs and bacon.'],
        ['start' => 29, 'end' => 32, 'text' => 'Russia goes for rye bread, porridge and sausage.'],
        ['start' => 32, 'end' => 35, 'text' => 'Bread, cold cuts, a hard-boiled egg, cucumber and tomatoes are eaten in Sweden.'],
        ['start' => 35, 'end' => 40, 'text' => 'Mexicans have tortillas, fried eggs, beans and salsa.'],
        ['start' => 40, 'end' => 47, 'text' => 'And perhaps the worst of them all is Australia, who eats corn flakes, toast and Vegemite.'],
        ['start' => 47, 'end' => 52, 'text' => "So what's your favorite?"],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
