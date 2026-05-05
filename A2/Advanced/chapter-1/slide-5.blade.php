<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time'           => 96,
            'type'           => 'multiple_choice',
            'question'       => 'Who is the head of design?',
            'options'        => [
                'Paul',
                'Emir',
                'Vanya',
                'Patrick',
            ],
            'correct_answer' => 'Emir',
            'points'         => 1,
        ],
        [
            'time'           => 102,
            'type'           => 'multiple_choice',
            'question'       => 'What does Paul do?',
            'options'        => [
                'He manages artists',
                'He works in social media',
                'He produces content',
                'He teaches English',
            ],
            'correct_answer' => 'He produces content',
            'points'         => 1,
        ],
        [
            'time'           => 108,
            'type'           => 'multiple_choice',
            'question'       => 'What does Paul say he is responsible for?',
            'options'        => [
                'Writing',
                'Filming',
                'Marketing',
                'Editing',
            ],
            'correct_answer' => 'Writing',
            'points'         => 1,
        ],
        [
            'time'           => 114,
            'type'           => 'multiple_choice',
            'question'       => 'What is Vanya’s job?',
            'options'        => [
                'Design',
                'Social media and marketing',
                'Writing',
                'Training',
            ],
            'correct_answer' => 'Social media and marketing',
            'points'         => 1,
        ],
        [
            'time'           => 120,
            'type'           => 'multiple_choice',
            'question'       => 'Does Vanya like her job?',
            'options'        => [
                'Yes',
                'No',
                'Sometimes',
                'Not sure',
            ],
            'correct_answer' => 'Yes',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 8,   'text' => 'In this video, Vanya, Emir and Paul have a training session.'],
        ['start' => 8,  'end' => 16,  'text' => 'Listen to the language they use for talking about their jobs and practise saying the useful phrases.'],

        ['start' => 16, 'end' => 20,  'text' => "Patrick: what's your role in the company?"],
        ['start' => 20, 'end' => 26,  'text' => "Emir: I'm the head of design. I manage artists and graphic designers."],
        ['start' => 26, 'end' => 30,  'text' => 'Patrick: Good. What about you?'],
        ['start' => 30, 'end' => 34,  'text' => "Paul: I'm a content producer."],
        ['start' => 34, 'end' => 38,  'text' => 'Patrick: What does that mean?'],
        ['start' => 38, 'end' => 42,  'text' => "Paul: It means I'm responsible for writing."],
        ['start' => 42, 'end' => 46,  'text' => 'Patrick: Nice. And you – what do you do?'],
        ['start' => 46, 'end' => 50,  'text' => 'Vanya: Social media and marketing.'],
        ['start' => 50, 'end' => 54,  'text' => 'Patrick: Do you like your job?'],
        ['start' => 54, 'end' => 58,  'text' => 'Vanya: Yeah, I love it!'],
        ['start' => 58, 'end' => 66,  'text' => "Patrick: What's the best part of your job? And two: Do you like the people you work with?"],
        ['start' => 66, 'end' => 74,  'text' => 'So, did you notice the useful phrases used for talking about your job?'],
        ['start' => 74, 'end' => 78,  'text' => 'Listen to me and then repeat.'],

        ['start' => 78, 'end' => 82,  'text' => "What's your role in the company?"],
        ['start' => 82, 'end' => 86,  'text' => "I'm the head of design."],
        ['start' => 86, 'end' => 90,  'text' => 'I manage artists and graphic designers.'],
        ['start' => 90, 'end' => 94,  'text' => 'What about you?'],
        ['start' => 94, 'end' => 98,  'text' => "I'm a content producer."],
        ['start' => 98, 'end' => 102, 'text' => "I'm responsible for writing."],
        ['start' => 102, 'end' => 106, 'text' => 'What do you do?'],
        ['start' => 106, 'end' => 110, 'text' => 'Do you like your job?'],
        ['start' => 110, 'end' => 114, 'text' => 'Yes, I love it!'],
        ['start' => 114, 'end' => 118, 'text' => "What's the best part of your job?"],
        ['start' => 118, 'end' => 122, 'text' => 'Do you like the people you work with?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])