<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-2/video/breakfast-encrypted/breakfast.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-2/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 16200,
            'type' => 'multiple_choice',
            'question' => 'Rice and miso soup are eaten in Japan for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 22550,
            'type' => 'multiple_choice',
            'question' => 'What is eaten in India?',
            'options' => ['Rice and soup', 'Dosa, sambar and chutney', 'Bread and eggs', 'Fruit and toast'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 28000,
            'type' => 'multiple_choice',
            'question' => 'Bread rolls and sausages are eaten in Mexico for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 42200,
            'type' => 'multiple_choice',
            'question' => 'Grilled tomatoes and eggs are eaten in the United Kingdom.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 49000,
            'type' => 'multiple_choice',
            'question' => 'What is eaten in Russia?',
            'options' => ['Tortillas and beans', 'Pancakes and bacon', 'Rye bread, porridge and sausage', 'Corn flakes and milk'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 71000,
            'type' => 'multiple_choice',
            'question' => 'Tortillas and beans are eaten in Australia for breakfast.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'This is what breakfast looks like around the world.'],
        ['start' => 4,  'end' => 10,  'text' => 'So in the United States we eat pancakes, eggs and bacon.'],
        ['start' => 10,  'end' => 16, 'text' => 'White rice, miso soup and pickled vegetables are eaten in Japan.'],
        ['start' => 16.5, 'end' => 22.5, 'text' => 'In India, dosa, sambar and chutney are eaten for breakfast.'],
        ['start' => 22.7, 'end' => 27.5, 'text' => 'Germany eats a bread roll, hard-boiled eggs and sausages.'],
        ['start' => 29.5, 'end' => 34, 'text' => 'Brazilians eat fruit, toast and ham.'],
        ['start' => 35.5, 'end' => 42, 'text' => 'The United Kingdom opts for sausages, grilled tomatoes, eggs and bacon.'],
        ['start' => 43.5, 'end' => 48.5, 'text' => 'Russia goes for rye bread, porridge and sausage.'],
        ['start' => 49.5, 'end' => 56.5, 'text' => 'Bread, cold cuts, a hard-boiled egg, cucumber and tomatoes are eaten in Sweden.'],
        ['start' => 57.5, 'end' => 62.5, 'text' => 'Mexicans have tortillas, fried eggs, beans and salsa.'],
        ['start' => 63.5, 'end' => 70.5, 'text' => 'And perhaps the worst of them all is Australia, who eats corn flakes, toast and Vegemite.'],
        ['start' => 72.5, 'end' => 75, 'text' => "So what's your favorite?"],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])