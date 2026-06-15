<?php

$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-8/img/slide9.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            // After: "I would let people work from home."
            'time' => 10500,
            'type' => 'multiple_choice',
            'question' => 'What would the woman change if she were the boss?',
            'options' => [
                'Increase working hours',
                'Let people work from home',
                'Close the company',
                'Hire more workers',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "If the weather was nice, I would work at night."
            'time' => 32500,
            'type' => 'multiple_choice',
            'question' => 'What would the woman do if the weather was nice?',
            'options' => [
                'Work during the day',
                'Take a holiday',
                'Work at night',
                'Stay at home',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "I would study something practical like computer engineering."
            'time' => 72500,
            'type' => 'multiple_choice',
            'question' => 'What would the woman study if she could go back to school?',
            'options' => [
                'Art history',
                'Medicine',
                'Computer engineering',
                'Business',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "I would develop apps to help people stay fit..."
            'time' => 87000,
            'type' => 'multiple_choice',
            'question' => 'Why would the woman develop apps?',
            'options' => [
                'To make money',
                'To help people stay fit',
                'To teach students',
                'To learn history',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "I would study something I love like art history."
            'time' => 102500,
            'type' => 'multiple_choice',
            'question' => 'The man would study art history if he could study anything.',
            'options' => [
                'True',
                'False',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            // After: "No, but perhaps I could write books or be a tour guide at a museum."
            'time' => 119500,
            'type' => 'multiple_choice',
            'question' => 'The man wants to become a teacher.',
            'options' => [
                'True',
                'False',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 4,    'text' => 'Conversation 1'],
        ['start' => 4.5,  'end' => 9,    'text' => 'Man: So, if you were the boss, what would you change about the company?'],
        ['start' => 9.5,  'end' => 13,   'text' => 'Woman: Well, first, I would let people work from home.'],
        ['start' => 13.5, 'end' => 17,   'text' => 'Man: I would like that. What else would you change?'],
        ['start' => 17.5, 'end' => 22,   'text' => 'Woman: I would also let employees set their own schedule.'],
        ['start' => 22.5, 'end' => 26,   'text' => 'Man: I would love that. What hours would you work?'],
        ['start' => 26.5, 'end' => 33,   'text' => 'Woman: It would change day by day. If the weather was nice, I would work at night.'],
        ['start' => 33.5, 'end' => 36.5, 'text' => 'Man: And if the weather was bad?'],
        ['start' => 37,   'end' => 41,   'text' => 'Woman: Then I would work during the day. What about you?'],
        ['start' => 41.5, 'end' => 45,   'text' => 'Man: I’m not sure. Maybe I would do the same.'],
        ['start' => 45.5, 'end' => 51,   'text' => 'Woman: See? Things would be better around here if I were the boss!'],

        ['start' => 56,   'end' => 60,   'text' => 'Conversation 2'],
        ['start' => 60.5, 'end' => 65,   'text' => 'Man: If you could go back to school, what would you study?'],
        ['start' => 65.5, 'end' => 72,   'text' => 'Woman: I think I would study something practical like computer engineering.'],
        ['start' => 72.5, 'end' => 76,   'text' => 'Man: What would you do with a degree like that?'],
        ['start' => 76.5, 'end' => 87,   'text' => 'Woman: I would develop apps to help people stay fit, I think, because I love exercise. What about you?'],
        ['start' => 87.5, 'end' => 96,   'text' => 'Man: Well, if I could study anything, I would study something I love like art history.'],
        ['start' => 96.5, 'end' => 101,  'text' => 'Woman: Oh, that sounds interesting. Would you want to be a teacher?'],
        ['start' => 101.5,'end' => 110,  'text' => 'Man: No, but perhaps I could write books or be a tour guide at a museum.'],
        ['start' => 110.5,'end' => 114,  'text' => 'Woman: I like your idea. That sounds nice.'],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])