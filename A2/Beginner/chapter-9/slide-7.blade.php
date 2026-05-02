<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => "Watch again & do the quiz",
    'subtitle' => "Who's your favourite celebrity?",

    'video' => materialAsset('slider/A2/Beginner/chapter-9/video/shakira-descripton-encrypted/shakira-descripton.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-9/img/slide7.webp'),


    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 16200,
            'type' => 'multiple_choice',
            'question' => 'What does Shakira look like?',
            'options' => [
                'Short and thin',
                'Tall and athletic',
                'Short and overweight',
                'Tall and old',
            ],
            'correct_answer' => 1,
            'points' => 1,
        ],
        [
            'time' => 33200,
            'type' => 'multiple_choice',
            'question' => 'What is Shakira like?',
            'options' => [
                'Rude and lazy',
                'Supportive and helpful',
                'Shy and quiet',
                'Angry and unfriendly',
            ],
            'correct_answer' => 1,
            'points' => 1,
        ],
        [
            'time' => 21800,
            'type' => 'true_false',
            'question' => 'She has got short black hair.',
            'correct_answer' => false,
            'points' => 1,
        ],
        [
            'time' => 35200,
            'type' => 'true_false',
            'question' => 'She likes to wear comfortable clothes.',
            'correct_answer' => true,
            'points' => 1,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => 'Hello, this is a description of Shakira.'],
        ['start' => 4, 'end' => 11, 'text' => "She's a very beautiful person. She's 34 years old, born on 2/2/1977."],
        ['start' => 11, 'end' => 16, 'text' => "She's tall, athletic, and her hair is long and blonde."],
        ['start' => 16.5, 'end' => 21.5, 'text' => "Her eyes are big and round, her eyebrows are defined, and her temperature is here."],
        ['start' => 22, 'end' => 25, 'text' => 'Shakira is a famous singer.'],
        ['start' => 25, 'end' => 30, 'text' => "She's a person with a great dose of spirit, body, and human work."],
        ['start' => 30, 'end' => 33, 'text' => "She's supportive and helpful to various organizations."],
        ['start' => 33.5, 'end' => 35, 'text' => 'She likes to dress in comfortable clothing.'],
        ['start' => 36, 'end' => 38, 'text' => 'She does not like to put on makeup.'],
        ['start' => 38.5, 'end' => 43, 'text' => 'If I had not been a singer, I would have been a biologist.'],
        ['start' => 43.5, 'end' => 47.5, 'text' => "She likes to eat lots of chocolates. She's very famous."],
        ['start' => 48, 'end' => 50, 'text' => 'Thank you very much.'],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])