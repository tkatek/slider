<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset(''),
    'isQuiz'         => 1, // 1 show question / 0 don't
    'showTranscript' => 1,

    'questions'      => [
        [
            'time' => 17000,
            'type' => 'multiple_choice',
            'question' => 'He says ____ is a hassle.',
            'options' => [
                'getting to the airport',
                'going through security',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 29000,
            'type' => 'multiple_choice',
            'question' => 'He is not sure why some people ____ .',
            'options' => [
                'recline their seats',
                'get on first',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 39000,
            'type' => 'multiple_choice',
            'question' => 'He says the ____ is bad on the plane.',
            'options' => [
                'food',
                'air',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => "Hi, my name is Adam. I’m from the U.S."],
        ['start' => 3,  'end' => 6,  'text' => "The question is: What annoys you about flying?"],
        ['start' => 6,  'end' => 8,  'text' => "For me, there are a few annoying things."],

        ['start' => 8,  'end' => 13, 'text' => "Security checks at the airport are difficult. The lines are very long."],
        ['start' => 13, 'end' => 18, 'text' => "In some countries, you cannot bring small bottles of liquid."],
        ['start' => 18, 'end' => 21, 'text' => "Sometimes you must take off your shoes. It is a hassle."],

        ['start' => 21, 'end' => 26, 'text' => "Waiting in line is very annoying. When you get on the plane, you must wait again."],
        ['start' => 26, 'end' => 32, 'text' => "There are different classes, and some people board first because they pay more."],
        ['start' => 32, 'end' => 35, 'text' => "I don’t really understand that."],

        ['start' => 35, 'end' => 39, 'text' => "When you are on the plane, the food is not very good."],
        ['start' => 39, 'end' => 42, 'text' => "I think flying has many problems."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])