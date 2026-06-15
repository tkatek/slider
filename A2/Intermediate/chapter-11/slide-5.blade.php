<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-11/video/facial-expressions-encrypted/facial-expressions.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-11/img/slide5.webp'),
    'isQuiz'         => 0,

    'questions' => [
        [
            // After: "Worried face" / Silent gap: 7s - 7.5s
            'time' => 7100,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are nervous or afraid?',
            'options' => ['Worried face', 'Happy face', 'Laughing face', 'Blush face'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            // After: "Confused face" / Silent gap: 9s - 9.5s
            'time' => 9100,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you don’t understand something?',
            'options' => ['Confused face', 'Happy face', 'Naughty face', 'Laughing face'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            // After: "Shocked face" / Silent gap: 12s - 12.5s
            'time' => 12100,
            'type' => 'multiple_choice',
            'question' => 'Which face shows strong surprise?',
            'options' => ['Thinking face', 'Shocked face', 'Smile face', 'Wink face'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "Laughing out loud" / Silent gap: 27s - 27.8s
            'time' => 27100,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are laughing a lot?',
            'options' => ['Cry face', 'Angry face', 'Laughing out loud', 'Thinking face'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "Smile face" / End of video
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are happy?',
            'options' => ['Angry face', 'Smile face', 'Worried face', 'Confused face'],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,    'end' => 3,    'text' => "Let's learn facial expressions."],
        ['start' => 3,    'end' => 5,    'text' => 'Wink face.'],
        ['start' => 5,    'end' => 7,    'text' => 'Worried face.'],
        ['start' => 7.5,  'end' => 9,    'text' => 'Confused face.'],
        ['start' => 9.5,  'end' => 12,   'text' => 'Shocked face.'],
        ['start' => 12.5, 'end' => 14,   'text' => 'Angry face.'],
        ['start' => 15,   'end' => 17,   'text' => 'Thinking face.'],
        ['start' => 17.5, 'end' => 19,   'text' => 'Happy face.'],
        ['start' => 20,   'end' => 22,   'text' => 'Naughty face.'],
        ['start' => 23,   'end' => 25,   'text' => 'Cry face.'],
        ['start' => 25.5, 'end' => 27,   'text' => 'Laughing out loud.'],
        ['start' => 27.8, 'end' => 29.5, 'text' => 'Blush face.'],
        ['start' => 30.5, 'end' => 32,   'text' => 'Smile face.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])