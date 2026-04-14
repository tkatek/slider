<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-6/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-1/slide15.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            'time' => 15000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: When does the weather become warm and mild?',
            'options' => [
                'Winter',
                'Summer',
                'Spring',
                'Autumn'
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: What do people like to do in summer?',
            'options' => [
                'Build snowmen',
                'Eat ice cream',
                'Carve pumpkins',
                'Fly kites'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 46000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What happens to days in autumn?',
            'options' => [
                'They get longer',
                'They get shorter',
                'They stay the same',
                'They get hotter'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 60000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: What is the coldest season?',
            'options' => [
                'Spring',
                'Summer',
                'Autumn',
                'Winter'
            ],
            'correct_answer' => 4,
            'points' => 10
        ],
        [
            'time' => 68000,
            'type' => 'multiple_choice',
            'question' => 'Question 5: What do people do in winter?',
            'options' => [
                'Swim in the ocean',
                'Have picnics',
                'Build snowmen',
                'Fly kites'
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'There are four seasons in a year: Spring, Summer, Autumn, also called Fall, and Winter.'],

        ['start' => 4,  'end' => 8,  'text' => 'Part one: Spring.'],
        ['start' => 8,  'end' => 14, 'text' => 'Spring is the season when the world wakes up after winter.'],
        ['start' => 14, 'end' => 19, 'text' => 'The weather gets warm and mild, not too hot and not too cold.'],
        ['start' => 19, 'end' => 24, 'text' => 'It often rains gently, helping everything grow.'],
        ['start' => 24, 'end' => 28, 'text' => 'Flowers bloom everywhere.'],
        ['start' => 28, 'end' => 32, 'text' => 'In spring, we love to fly kites and have picnics.'],

        ['start' => 32, 'end' => 36, 'text' => 'Part two: Summer.'],
        ['start' => 36, 'end' => 42, 'text' => 'Summer is the hottest and sunniest season.'],
        ['start' => 42, 'end' => 47, 'text' => 'The days are long and warm, and sometimes very hot.'],
        ['start' => 47, 'end' => 51, 'text' => 'The sky is bright blue almost every day.'],
        ['start' => 51, 'end' => 57, 'text' => 'In summer, we love to swim in the pool or ocean and eat ice cream.'],
        ['start' => 57, 'end' => 62, 'text' => 'We also play outside until late because the sun stays up so long.'],
        ['start' => 62, 'end' => 66, 'text' => 'Many people go on vacation to the beach.'],

        ['start' => 66, 'end' => 70, 'text' => 'Part three: Autumn.'],
        ['start' => 70, 'end' => 75, 'text' => 'Autumn comes after summer.'],
        ['start' => 75, 'end' => 80, 'text' => 'The weather gets cooler.'],
        ['start' => 80, 'end' => 85, 'text' => 'Days become shorter and nights get longer.'],
        ['start' => 85, 'end' => 89, 'text' => 'In autumn, we love to carve pumpkins for Halloween.'],

        ['start' => 89, 'end' => 93, 'text' => 'Part four: Winter.'],
        ['start' => 93, 'end' => 99, 'text' => 'Winter is the coldest season.'],
        ['start' => 99, 'end' => 104, 'text' => 'In many places it snows, and everything looks white and sparkly.'],
        ['start' => 104,'end' => 109, 'text' => 'Days are short and nights are long.'],
        ['start' => 109,'end' => 115, 'text' => 'In winter, we love to build snowmen and go sledding or ice skating.'],
        ['start' => 115,'end' => 120, 'text' => 'Which season is your favorite, and why?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])