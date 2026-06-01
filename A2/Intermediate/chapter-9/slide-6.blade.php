<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-9/video/weekend-encrypted/weekend.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-9/img/slide6.webp'),
    'isQuiz'         => 0,

    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => 'What does Woman 1 invite Woman 2 to do?',
            'options' => [
                'Go to the cinema',
                'Go shopping',
                'Visit friends',
                'Play sports',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 15200,
            'type' => 'multiple_choice',
            'question' => 'What is Woman 2 doing at 9 a.m. on Saturday?',
            'options' => [
                'Taking a class',
                'Doing laundry',
                'Making breakfast for friends',
                'Visiting her parents',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 29200,
            'type' => 'multiple_choice',
            'question' => 'Why can’t they meet on Saturday afternoon?',
            'options' => [
                'They are tired',
                'They both have plans',
                'The shops are closed',
                'They don’t want to go',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 29600,
            'type' => 'multiple_choice',
            'question' => 'What is Woman 1 doing at 5 p.m. on Saturday?',
            'options' => [
                'Exercising',
                'Shopping',
                'Visiting parents',
                'Going to the movies',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
        [
            'time' => 48500,
            'type' => 'multiple_choice',
            'question' => 'When do they finally agree to meet?',
            'options' => [
                'Saturday morning',
                'Saturday afternoon',
                'Sunday morning',
                'Sunday late afternoon',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 3.5,    'text' => 'Woman 1: What are you doing this weekend? Do you want to go shopping with me?'],
        ['start' => 4.5,  'end' => 7,    'text' => 'Woman 2: That sounds great. When do you want to go?'],
        ['start' => 7,  'end' => 9,  'text' => 'Woman 1: How about Saturday morning?'],
        ['start' => 9,   'end' => 15,   'text' => "Woman 2: Oh, I'm making breakfast for some friends at nine. Then I'm doing laundry from eleven to noon."],
        ['start' => 15.5, 'end' => 17,   'text' => 'Woman 1: Saturday afternoon?'],
        ['start' => 17, 'end' => 21.5, 'text' => "Woman 2: I'm taking an art class from one to three. How about three-thirty?"],
        ['start' => 21.5,   'end' => 29,   'text' => "Woman 1: No, I'm exercising with a friend from three to four. Then I'm going to the movies at five with my sister."],
        ['start' => 29.8, 'end' => 31,   'text' => 'Woman 2: Sunday morning?'],
        ['start' => 31.5, 'end' => 37,   'text' => "Woman 1: I'm visiting my parents until ten. Then I'm meeting a friend at the art museum until one."],
        ['start' => 38, 'end' => 39.5,   'text' => 'Woman 1: Sunday afternoon?'],
        ['start' => 39.5, 'end' => 43.5,   'text' => "Woman 2: I'm going to a baseball game with Bob at one. How about late afternoon?"],
        ['start' => 44.7, 'end' => 45.8,   'text' => 'Woman 1: Around five?'],
        ['start' => 45.8, 'end' => 48, 'text' => 'Woman 2: Great!'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])