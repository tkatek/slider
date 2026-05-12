<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-1/video/people-encrypted/people.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-1/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 5700,
            'type' => 'multiple_choice',
            'question' => 'What do people do in Tibet when they greet each other?',
            'options' => ['Shake hands', 'Bow', 'Stick out their tongue', 'Clap their hands'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 17000,
            'type' => 'multiple_choice',
            'question' => 'How do people greet each other in many European countries?',
            'options' => ['They bow', 'They air kiss on the cheeks', 'They rub noses', 'They snap fingers'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 22900,
            'type' => 'multiple_choice',
            'question' => 'How do the Māori people greet each other?',
            'options' => ['They shake hands', 'They bow', 'They rub noses and foreheads', 'They clap'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 34500,
            'type' => 'multiple_choice',
            'question' => 'What do people do in East Asian countries when greeting?',
            'options' => ['Clap their hands', 'Bow', 'Bump noses', 'Shake hands'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 51500,
            'type' => 'multiple_choice',
            'question' => 'What is a sign of respect in Malaysia and the Philippines?',
            'options' => ['Snapping fingers', 'Pressing palms together', 'Taking an elder’s hand and touching the forehead', 'Air kissing'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 2.5,  'text' => 'How do people greet each other around the world?'],
        ['start' => 2.7,  'end' => 5.5,  'text' => 'In Tibet, they stick out their tongue.'],
        ['start' => 6,  'end' => 9.5,  'text' => 'In some Gulf countries, they bump noses.'],
        ['start' => 11.5,  'end' => 16.5, 'text' => 'In many European and South American countries, they air kiss each other on the cheeks.'],
        ['start' => 18.5, 'end' => 22.5, 'text' => 'The Māori people in New Zealand rub noses and foreheads.'],
        ['start' => 23.5, 'end' => 28, 'text' => 'In Zimbabwe, people clap their hands when greeting each other.'],
        ['start' => 29.7, 'end' => 34, 'text' => 'In most East Asian countries, people bow when greeting each other.'],
        ['start' => 35.5, 'end' => 41.5, 'text' => 'In most Southeast Asian countries, people press their palms together in a prayer position and nod slightly.'],
        ['start' => 43.5, 'end' => 51, 'text' => 'In Malaysia and the Philippines, young people take the hand of an elder and press their knuckles against the forehead as a sign of respect.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])