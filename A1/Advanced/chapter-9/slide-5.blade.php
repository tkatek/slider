<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-9/video/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Which location is specifically designed to be quiet for reading and borrowing books?',
            'options' => [
                'School',
                'Library',
                'Stadium',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 7000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Which place is described as where kids go to learn and have fun with their friends?',
            'options' => [
                'School',
                'Library',
                'Stadium',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 22000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: Where do firefighters work to ensure public safety?',
            'options' => [
                'Fire station',
                'Library',
                'Factory',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: In which place can you watch sports games and attend concerts?',
            'options' => [
                'A stadium',
                'A library',
                'A mosque',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 47000,
            'type' => 'multiple_choice',
            'question' => 'Question 5: Where are goods manufactured?',
            'options' => [
                'Port',
                'Park',
                'Factory',
                'Library',
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 5,  'text' => "Today we will learn about some places in our community."],
        ['start' => 5,  'end' => 10, 'text' => "A school is a place where students learn and make friends."],
        ['start' => 10, 'end' => 15, 'text' => "A library is a quiet place where you read and borrow books."],
        ['start' => 15, 'end' => 20, 'text' => "A restaurant is a place where you eat."],
        ['start' => 20, 'end' => 25, 'text' => "A fire station is a place where firefighters work to keep people safe."],
        ['start' => 25, 'end' => 30, 'text' => "A stadium is a big place where you attend sports events and shows."],
        ['start' => 30, 'end' => 35, 'text' => "A gym is a place where people work out and exercise."],
        ['start' => 35, 'end' => 40, 'text' => "A mosque is a place where people pray."],
        ['start' => 40, 'end' => 45, 'text' => "A skyscraper is a very tall building."],
        ['start' => 45, 'end' => 50, 'text' => "A factory is a place where things are made."],
        ['start' => 50, 'end' => 55, 'text' => "A port is a place where ships dock."],
        ['start' => 55, 'end' => 60, 'text' => "A parking lot is a place to park cars."],
        ['start' => 60, 'end' => 66, 'text' => "A food truck park is a place where you can buy food from many food trucks."],
        ['start' => 66, 'end' => 72, 'text' => "A drive-in theatre is a place where you watch a movie from your car."],
        ['start' => 72, 'end' => 78, 'text' => "A gas station is a place where you fill up your car."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])