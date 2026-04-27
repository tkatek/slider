<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-1/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-1/img/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => 'What do people do in Tibet when they greet each other?',
            'options' => ['Shake hands', 'Bow', 'Stick out their tongue', 'Clap their hands'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 11000,
            'type' => 'multiple_choice',
            'question' => 'How do people greet each other in many European countries?',
            'options' => ['They bow', 'They air kiss on the cheeks', 'They rub noses', 'They snap fingers'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => 'How do the Māori people greet each other?',
            'options' => ['They shake hands', 'They bow', 'They rub noses and foreheads', 'They clap'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 27000,
            'type' => 'multiple_choice',
            'question' => 'What do people do in East Asian countries when greeting?',
            'options' => ['Clap their hands', 'Bow', 'Bump noses', 'Shake hands'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 53000,
            'type' => 'multiple_choice',
            'question' => 'What is a sign of respect in Malaysia and the Philippines?',
            'options' => ['Snapping fingers', 'Pressing palms together', 'Taking an elder’s hand and touching the forehead', 'Air kissing'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 1,  'text' => 'How do people greet each other around the world?'],
        ['start' => 1,  'end' => 4,  'text' => 'In Tibet, they stick out their tongue.'],
        ['start' => 4,  'end' => 7,  'text' => 'In some Gulf countries, they bump noses.'],
        ['start' => 7,  'end' => 11, 'text' => 'In many European and South American countries, they air kiss each other on the cheeks.'],
        ['start' => 11, 'end' => 16, 'text' => 'The Māori people in New Zealand rub noses and foreheads.'],
        ['start' => 16, 'end' => 22, 'text' => 'In Zimbabwe, people clap their hands when greeting each other.'],
        ['start' => 22, 'end' => 27, 'text' => 'In most East Asian countries, people bow when greeting each other.'],
        ['start' => 27, 'end' => 36, 'text' => 'In most Southeast Asian countries, people press their palms together in a prayer position and nod slightly.'],
        ['start' => 36, 'end' => 43, 'text' => 'The Inuit people in Greenland and other Arctic regions rub noses and sniff the face of the person they are greeting.'],
        ['start' => 43, 'end' => 46, 'text' => 'In Nigeria, people snap their fingers as they shake hands.'],
        ['start' => 46, 'end' => 53, 'text' => 'In Malaysia and the Philippines, young people take the hand of an elder and press their knuckles against the forehead as a sign of respect.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])