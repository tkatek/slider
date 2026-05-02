<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-9/video/places-encrypted/places.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide6.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 7200,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Which place is described as where kids go to learn and have fun with their friends?',
            'options' => [
                'School',
                'Library',
                'Stadium',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Which location is specifically designed to be quiet for reading and borrowing books?',
            'options' => [
                'School',
                'Library',
                'Stadium',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 33600,
            'type' => 'multiple_choice',
            'question' => 'Question 3: Where do firefighters work to ensure public safety?',
            'options' => [
                'Fire station',
                'Library',
                'Factory',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 43500,
            'type' => 'multiple_choice',
            'question' => 'Question 4: In which place can you watch sports games and attend concerts?',
            'options' => [
                'A stadium',
                'A library',
                'A mosque',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 76900,
            'type' => 'multiple_choice',
            'question' => 'Question 5: Where are goods manufactured?',
            'options' => [
                'Port',
                'Park',
                'Factory',
                'Library',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 2.5,  'text' => "School"],
        ['start' => 2.5,  'end' => 7, 'text' => "Is a place where students learn and make friends."],
        ['start' => 7.5, 'end' => 9.5, 'text' => "Library"],
        ['start' => 11.5, 'end' => 15.5, 'text' => "Is a quiet place where you read and borrow books."],
        ['start' => 17, 'end' => 20, 'text' => "Restaurant"],
        ['start' => 20.3, 'end' => 23, 'text' => "Is a place where you eat."],
        ['start' => 25.3, 'end' => 27, 'text' => "Fire station"],
        ['start' => 28.5, 'end' =>33, 'text' => "Is a place where firefighters work to keep people safe."],
        ['start' => 34.3, 'end' => 36, 'text' => "Stadium"],
        ['start' => 38.5, 'end' => 43, 'text' => "Is a big place where you attend sports events and shows."],
        ['start' => 44.7, 'end' => 46, 'text' => "Gym"],
        ['start' => 48, 'end' => 51.5, 'text' => "Is a place where people work out and exercise."],
        ['start' => 53.5, 'end' => 55, 'text' => "Mosque"],
        ['start' => 57, 'end' => 61, 'text' => "Is a place where people pray."],
        ['start' => 61.5, 'end' => 62.5, 'text' => "Skyscraper"],
        ['start' => 64.7, 'end' => 66.5, 'text' => "Is a very tall building."],
        ['start' => 69.5, 'end' => 71, 'text' => "Factory"],
        ['start' => 73.5, 'end' => 76.5, 'text' => "A place where things are made."],
        ['start' => 78, 'end' => 80, 'text' => "Port"],
        ['start' => 81, 'end' => 83.5, 'text' => "Is a place where ships dock."],
        ['start' => 86, 'end' => 88.5, 'text' => "Parking lot"],
        ['start' => 89, 'end' => 92, 'text' => "A place to park cars."],
        ['start' => 93.7, 'end' => 96, 'text' => "Food truck park"],
        ['start' => 97.5, 'end' => 102, 'text' => "Is a place where you can buy food from many food trucks."],
        ['start' => 104, 'end' => 106, 'text' => "Drive-in theatre"],
        ['start' => 107, 'end' => 110, 'text' => "Is a place where you watch a movie from your car."],
        ['start' => 113.5, 'end' => 115.5, 'text' => "Gas station"],
        ['start' => 117, 'end' => 119, 'text' => "Is a place where you fill up your car."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])