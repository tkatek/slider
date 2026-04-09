<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-7/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-7/img/.webp'),
    'isQuiz'     => 1,
    'questions'  => [
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Which word is for asking politely (permission)?',
            'options' => ['Might', 'Can', 'Must'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: What word means not allowed (prohibition)?',
            'options' => ['Should', 'Can', 'Must not'],
            'correct_answer' => 3,
            'points' => 10,
        ],
        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What phrase means a rule at work (obligation)?',
            'options' => ['You are allowed to...', 'You have to...', 'You take advantage of...', "You don't have to..."],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 94000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: What is the rule about trash?',
            'options' => [
                'You can’t throw trash on the floor.',
                'You should throw trash on the floor.',
                'You are allowed to throw trash on the floor.',
                'You can throw trash on the floor.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 24, 'end' => 52, 'text' => ''],
        ['start' => 52, 'end' => 83, 'text' => ''],
        ['start' => 83, 'end' => 94, 'text' => ''],
        ['start' => 94, 'end' => 100, 'text' => ''],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])