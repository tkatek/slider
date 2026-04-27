<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-9/video/encrypted/slide13.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-9/img/slide13.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 12000,
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
            'time' => 30000,
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
            'time' => 52000,
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
            'time' => 70000,
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
            'time' => 100000,
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
        ['start' => 0,    'end' => 4,    'text' => 'Woman 1: What are you doing this weekend? Do you want to go shopping with me?'],
        ['start' => 4.5,  'end' => 7,    'text' => 'Woman 2: That sounds great. When do you want to go?'],
        ['start' => 7.5,  'end' => 9.5,  'text' => 'Woman 1: How about Saturday morning?'],
        ['start' => 10,   'end' => 16,   'text' => "Woman 2: Oh, I'm making breakfast for some friends at nine. Then I'm doing laundry from eleven to noon."],
        ['start' => 16.5, 'end' => 18,   'text' => 'Woman 1: Saturday afternoon?'],
        ['start' => 18.5, 'end' => 23.5, 'text' => "Woman 2: I'm taking an art class from one to three. How about three-thirty?"],
        ['start' => 24,   'end' => 31,   'text' => "Woman 1: No, I'm exercising with a friend from three to four. Then I'm going to the movies at five with my sister."],
        ['start' => 31.5, 'end' => 33,   'text' => 'Woman 1: Sunday morning?'],
        ['start' => 33.5, 'end' => 40,   'text' => "Woman 2: I'm visiting my parents until ten. Then I'm meeting a friend at the art museum until one."],
        ['start' => 40.5, 'end' => 42,   'text' => 'Woman 1: Sunday afternoon?'],
        ['start' => 42.5, 'end' => 48,   'text' => "Woman 2: I'm going to a baseball game with Bob at one. How about late afternoon?"],
        ['start' => 48.5, 'end' => 50,   'text' => 'Woman 1: Around five?'],
        ['start' => 50.5, 'end' => 51.5, 'text' => 'Woman 2: Great!'],
        ['start' => 52.5, 'end' => 55,   'text' => 'Man 1: Hey. Do you want to play basketball tomorrow?'],
        ['start' => 55.5, 'end' => 56.5, 'text' => 'Man 2: Okay.'],
        ['start' => 57,   'end' => 59,   'text' => '[Audience laughs]'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])