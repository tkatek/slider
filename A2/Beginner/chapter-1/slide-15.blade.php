<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-1/video/seasons-encrypted/seasons.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-1/slide15.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            // After: "The weather gets warm and mild..."
            'time' => 27800,
            'type' => 'multiple_choice',
            'question' => 'Question 1: When does the weather become warm and mild?',
            'options' => [
                'Winter',
                'Summer',
                'Spring',
                'Autumn'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            // After: "We love to swim in the pool or ocean and eat ice cream."
            'time' => 65200,
            'type' => 'multiple_choice',
            'question' => 'Question 2: What do people like to do in summer?',
            'options' => [
                'Build snowmen',
                'Eat ice cream',
                'Carve pumpkins',
                'Fly kites'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // After: "Days become shorter and nights get longer."
            'time' => 87200,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What happens to days in autumn?',
            'options' => [
                'They get longer',
                'They get shorter',
                'They stay the same',
                'They get hotter'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // After: "Winter is the coldest season."
            'time' => 99700,
            'type' => 'multiple_choice',
            'question' => 'Question 4: What is the coldest season?',
            'options' => [
                'Spring',
                'Summer',
                'Autumn',
                'Winter'
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            // After: "We love to build snowmen and go sledding or ice skating."
            'time' => 115500,
            'type' => 'multiple_choice',
            'question' => 'Question 5: What do people do in winter?',
            'options' => [
                'Swim in the ocean',
                'Have picnics',
                'Build snowmen',
                'Fly kites'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'There are four seasons in a year'],
        ['start' => 4.7,  'end' => 12.5,  'text' => 'Spring, Summer, Autumn, also called Fall, and Winter.'],

        ['start' => 13.5,  'end' => 17,  'text' => ' Spring. What happens in spring?'],
        ['start' => 18,  'end' => 22, 'text' => 'Spring is the season when the world wakes up after winter.'],
        ['start' => 22.3, 'end' => 27.5, 'text' => 'The weather gets warm and mild, not too hot and not too cold.'],
        ['start' => 28, 'end' => 32, 'text' => 'It often rains gently, helping everything grow.'],
        ['start' => 33, 'end' => 35, 'text' => 'Flowers bloom everywhere.'],
        ['start' => 36, 'end' => 40, 'text' => 'We love to fly kites and have picnics.'],

        ['start' => 41.7,  'end' => 45.5,  'text' => 'Summer. What happens in summer?'],
        ['start' => 46, 'end' => 50, 'text' => 'Summer is the hottest and sunniest season.'],
        ['start' => 50.5, 'end' => 54.5, 'text' => 'The days are long and warm, and sometimes very hot.'],
        ['start' => 55, 'end' => 58.5, 'text' => 'The sky is bright blue almost every day.'],
        ['start' => 59.7, 'end' => 65, 'text' => 'We love to swim in the pool or ocean and eat ice cream.'],
        ['start' => 65.8, 'end' => 69.5, 'text' => 'Play outside until late because the sun stays up so long.'],
        ['start' => 70, 'end' => 73, 'text' => 'And go on vacation to the beach.'],

        ['start' => 75, 'end' => 79, 'text' => 'Autumn or Fall. What happens in autumn?'],
        ['start' => 79.5, 'end' => 81.5, 'text' => 'Autumn comes after summer.'],
        ['start' => 82, 'end' => 83.5, 'text' => 'The weather gets cooler.'],
        ['start' => 84, 'end' => 87, 'text' => 'Days become shorter and nights get longer.'],
        ['start' => 87.5, 'end' => 91, 'text' => 'We love to carve pumpkins for Halloween.'],

        ['start' => 93, 'end' => 96.5, 'text' => 'Winter. What happens in winter?'],
        ['start' => 97, 'end' => 99.5, 'text' => 'Winter is the coldest season.'],
        ['start' => 100, 'end' => 104.5, 'text' => 'In many places it snows, and everything looks white and sparkly.'],
        ['start' => 105,'end' => 108, 'text' => 'Days are short and nights are long.'],
        ['start' => 110,'end' => 115, 'text' => 'We love to build snowmen and go sledding or ice skating.'],
        ['start' => 117,'end' => 121, 'text' => 'Which season is your favorite, and why?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])