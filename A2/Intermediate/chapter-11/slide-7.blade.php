<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-11/video/encrypted/'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-11/img/slide7.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            // After: "happy face" / "smile face"
            'time' => 55000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are happy?',
            'options' => ['Angry face', 'Smile face', 'Worried face', 'Confused face'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "confused face"
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you don’t understand something?',
            'options' => ['Confused face', 'Happy face', 'Naughty face', 'Laughing face'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            // After: "shocked face"
            'time' => 31000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows strong surprise?',
            'options' => ['Thinking face', 'Shocked face', 'Smile face', 'Wink face'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "worried face"
            'time' => 13000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are nervous or afraid?',
            'options' => ['Worried face', 'Happy face', 'Laughing face', 'Blush face'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            // After: "laughing out loud"
            'time' => 108000,
            'type' => 'multiple_choice',
            'question' => 'Which face shows you are laughing a lot?',
            'options' => ['Cry face', 'Angry face', 'Laughing out loud', 'Thinking face'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles'  => [
        ['start' => 0, 'end' => 7, 'text' => "Let's learn facial expressions."],
        ['start' => 7, 'end' => 13, 'text' => 'Wink face.'],
        ['start' => 13, 'end' => 20, 'text' => 'Worried face.'],
        ['start' => 20, 'end' => 30, 'text' => 'Confused face.'],
        ['start' => 30, 'end' => 36, 'text' => 'Shocked face.'],
        ['start' => 36, 'end' => 42, 'text' => 'Angry face.'],
        ['start' => 42, 'end' => 48, 'text' => 'Thinking face.'],
        ['start' => 48, 'end' => 54, 'text' => 'Happy face.'],
        ['start' => 54, 'end' => 62, 'text' => 'Naughty face.'],
        ['start' => 62, 'end' => 68, 'text' => 'Cry face.'],
        ['start' => 68, 'end' => 76, 'text' => 'Laughing out loud.'],
        ['start' => 76, 'end' => 84, 'text' => 'Blush face.'],
        ['start' => 84, 'end' => 94, 'text' => 'Smile face.'],
        ['start' => 94, 'end' => 136, 'text' => 'Please do subscribe for more entertainment videos.'],
        ['start' => 136, 'end' => 138, 'text' => 'Thank you.'],
        ['start' => 138, 'end' => 140, 'text' => 'Have an awesome day. Bye bye.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])