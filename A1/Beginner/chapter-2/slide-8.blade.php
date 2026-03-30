<?php
$content = [
    'video'      => materialAsset('slider/A1/Beginner/chapter-2/video/encrypted/slide5.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Beginner/chapter-2/video/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 7500,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Nancy works at ___?',
            'options' => ['hospital', 'an employment agency.', 'at a travel agency.', 'at a clinic.'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 29000,
            'type' => 'input',
            'question' => "Question 2: What is Gordon's surname?",
            'accepted_answers' => 'Foley',
            'points' => 10
        ],
        [
            'time' => 40000,
            'type' => 'multiple_choice',
            'question' => "Question 3: What is Gordon's marital status?",
            'options' => ['Married', 'Divorced', 'Single', 'Widowed'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 46000,
            'type' => 'multiple_choice',
            'question' => "Question 4: What is Gordon's nationality?",
            'options' => ['British', 'Canadian', 'American', 'Australian'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => "Question 5: What is Gordon's email address?",
            'options' => [
                'Gordon-foley@public.com',
                'Gordon.foley@public.co',
                'Gordon-foley@public.co',
                'Gordon_foley@public.org'
            ],
            'correct_answer' => 2,
            'points' => 10
        ]
    ],
    // Video script (subtitles)
    'subtitles'  => [
        ['start' => 0,  'end' => 7,  'text' => 'Olivia: Good afternoon, Welcome to our employment agency, My name is Olivia'],
        ['start' => 7,  'end' => 8,  'text' => 'Gordon: Nice to meet you'],
        ['start' => 8,  'end' => 10, 'text' => 'Olivia: You too.'],
        ['start' => 11, 'end' => 16, 'text' => 'Olivia: To continue with your application, let’s fill in this form.'],
        ['start' => 16, 'end' => 20, 'text' => 'Olivia: First question. What’s your first name?'],
        ['start' => 20, 'end' => 23, 'text' => 'Gordon: My name is Gordon'],
        ['start' => 23, 'end' => 25, 'text' => 'Olivia: And what’s your surname?'],
        ['start' => 25, 'end' => 29, 'text' => 'Gordon: My surname is Foley'],
        ['start' => 29, 'end' => 31, 'text' => 'Olivia: How do you spell that?'],
        ['start' => 31, 'end' => 35, 'text' => 'Gordon: F-O-L-E-Y'],
        ['start' => 35, 'end' => 37, 'text' => 'Olivia: Are you married?'],
        ['start' => 37, 'end' => 40, 'text' => 'Gordon: No, I’m single'],
        ['start' => 40, 'end' => 43, 'text' => 'Olivia: And what’s your nationality?'],
        ['start' => 43, 'end' => 46, 'text' => 'Gordon: I’m American'],
        ['start' => 46, 'end' => 48, 'text' => 'Olivia: What’s your address?'],
        ['start' => 48, 'end' => 60, 'text' => 'Gordon: It’s nine Horton Avenue, Manchester, M11 6JZ.'],
        ['start' => 60, 'end' => 62, 'text' => 'Olivia: How do you spell Horton?'],
        ['start' => 62, 'end' => 66, 'text' => 'Gordon: W-H-O-R-T-O-N.'],
        ['start' => 66, 'end' => 71, 'text' => 'Olivia: Okay thanks, Right! Next question'],
        ['start' => 71, 'end' => 73, 'text' => 'Olivia: What’s your mobile number?'],
        ['start' => 73, 'end' => 79, 'text' => 'Gordon: It’s 07 86 66 51'],
        ['start' => 79, 'end' => 82, 'text' => 'Olivia: Thanks. And last question'],
        ['start' => 82, 'end' => 84, 'text' => 'Olivia: What’s your email address?'],
        ['start' => 84, 'end' => 90, 'text' => 'Gordon: It’s gordon-foley@public.co'],
        ['start' => 90, 'end' => 92, 'text' => 'Olivia: Okay, that’s all right'],
        ['start' => 92, 'end' => 96, 'text' => 'Olivia: Um, what kind of job are you looking for?'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])