<?php
$content = [
    'title'          => "Let's Watch This Video",
    'video'      => materialAsset('slider/A1/Advanced/chapter-7/video/signs-encrypted/signs.m3u8'),
    'thumbnail'      => materialAsset('slider/A1/Advanced/chapter-7/video/thumbnail.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 5200,
            'type' => 'multiple_choice',
            'question' => '1- Which word is used for asking politely (permission)?',
            'options' => ['Might', 'Can', 'Must'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 11200,
            'type' => 'multiple_choice',
            'question' => '2- What word means "not allowed" (prohibition)?',
            'options' => ['Should', 'Can', 'Must not'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 29200,
            'type' => 'multiple_choice',
            'question' => '3- What is the rule about trash?',
            'options' => [
                "You can't throw trash on the floor.",
                'You should throw trash on the floor.',
                'You are allowed to throw trash on the floor.',
                'You can throw trash on the floor.',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 36200,
            'type' => 'multiple_choice',
            'question' => '4- Which phrase means a rule at work (obligation)?',
            'options' => [
                'You are allowed to...',
                'You have to...',
                'You take advantage of...',
                "You don't have to...",
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 1.5,  'text' => 'Permissions'],
        ['start' => 1.5,  'end' => 3,    'text' => 'You Can Drink This Water.'],
        ['start' => 3,    'end' => 5,    'text' => 'You Can Swim Here.'],
        ['start' => 5,    'end' => 6.5,  'text' => 'Prohibitions'],
        ['start' => 6.5,  'end' => 9,    'text' => "You Can't Drink This Water."],
        ['start' => 9,    'end' => 11,   'text' => "You Can't Swim Here."],
        ['start' => 11,   'end' => 12,   'text' => 'Permission'],
        ['start' => 12,   'end' => 14.5, 'text' => 'You Are Allowed to Smoke Here.'],
        ['start' => 15,   'end' => 16.5, 'text' => 'You Can Smoke Here.'],
        ['start' => 16.5, 'end' => 19,   'text' => 'You Are Not Allowed to Smoke Here.'],
        ['start' => 19.8, 'end' => 21,   'text' => "You Can't Smoke Here."],
        ['start' => 21.5, 'end' => 23,   'text' => 'Prohibitions'],
        ['start' => 23,   'end' => 26,   'text' => "You Can't Throw Trash on the Floor."],
        ['start' => 26,   'end' => 29,   'text' => 'You Are Not Allowed to Throw Trash on the Floor.'],
        ['start' => 30,   'end' => 31,   'text' => 'Obligations'],
        ['start' => 31,   'end' => 34,   'text' => 'You Must Throw Trash Here.'],
        ['start' => 34,   'end' => 36,   'text' => 'You Have to Throw Trash Here.'],
        ['start' => 36,   'end' => 39,   'text' => 'You Have Got to Throw Trash Here.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])