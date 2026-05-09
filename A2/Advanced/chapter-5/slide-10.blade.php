<?php
$content = [
    'video'          => materialAsset('slider/A2/Advanced/chapter-5/'),
    'thumbnail'      => materialAsset('slider/A2/Advanced/chapter-5/img/slide10.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 5000,
            'type' => 'multiple_choice',
            'question' => 'What are you going to learn?',
            'options' => [
                'present perfect questions + just',
                'present perfect questions + already',
                'present perfect questions + ever',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'We use present perfect questions to ask about _________.',
            'options' => [
                'your hobbies',
                'life experiences',
                'what people did yesterday',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 41000,
            'type' => 'multiple_choice',
            'question' => "What does 'ever' mean?",
            'options' => [
                'at any time in your life',
                'in the future',
                'in the past',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 48000,
            'type' => 'multiple_choice',
            'question' => 'Have you ever ____ in public?',
            'options' => [
                'speak',
                'spoke',
                'spoken',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => '______ she ever spoken in public?',
            'options' => [
                'Has',
                'Have',
                'Does',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 71000,
            'type' => 'multiple_choice',
            'question' => 'Yes, I ______.',
            'options' => [
                'has',
                "hasn't",
                'have',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 76000,
            'type' => 'multiple_choice',
            'question' => 'No, she ______.',
            'options' => [
                'has',
                "haven't",
                "hasn't",
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 5,    'text' => 'Present perfect questions and ever.'],
        ['start' => 14,   'end' => 23,   'text' => "Have you ever eaten sushi? No, I haven't."],
        ['start' => 23,   'end' => 32,   'text' => 'We use present perfect questions to ask about life experiences.'],
        ['start' => 32,   'end' => 41,   'text' => 'We often use ever with present perfect yes/no questions about life experiences.'],
        ['start' => 41,   'end' => 48,   'text' => 'Ever means at any time in your life.'],
        ['start' => 48,   'end' => 71,   'text' => 'We form present perfect yes/no questions with have or has and a past participle.'],
        ['start' => 71,   'end' => 76,   'text' => 'We form short answers like this.'],
        ['start' => 76,   'end' => 83,   'text' => '[Music]'],
        ['start' => 83,   'end' => 100,  'text' => 'You. You.'],
        ['start' => 100,  'end' => 109,  'text' => 'We form present perfect wh-questions in a similar way to yes/no questions.'],
        ['start' => 109,  'end' => 118,  'text' => 'But we start with a question word. How many times have you seen this movie?'],
        ['start' => 118,  'end' => 123,  'text' => 'Which countries have you been to?'],
        ['start' => 123,  'end' => 126,  'text' => 'You.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])