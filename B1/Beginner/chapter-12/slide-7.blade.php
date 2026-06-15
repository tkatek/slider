<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-12/img/slide7.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 6500,
            'type' => 'multiple_choice',
            'question' => 'What did Jack eat before bed?',
            'options' => [
                'Pizza',
                'Salad',
                'A burrito',
                'Sandwich',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'How did Jack feel the next morning?',
            'options' => [
                'Happy',
                'Excited',
                'Hungry',
                'Sick',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
        [
            'time' => 26000,
            'type' => 'multiple_choice',
            'question' => 'Why did Jack go to the doctor?',
            'options' => [
                'He had a headache',
                'He felt even worse',
                'He broke his arm',
                'He had a cold',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 61000,
            'type' => 'multiple_choice',
            'question' => 'What advice did Jack\'s mum give him?',
            'options' => [
                'Eat more vegetables',
                'Go to bed early',
                'Don\'t eat spicy food before bed',
                'Drink more water',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 69500,
            'type' => 'multiple_choice',
            'question' => 'What lesson did Jack learn?',
            'options' => [
                'Never visit a doctor',
                'Never eat breakfast',
                'Never eat a burrito before bed again',
                'Never eat Mexican food',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 5,    'text' => 'Once upon a time, there was a man named Jack who ate a burrito before bed.'],
        ['start' => 5.5,  'end' => 11,   'text' => 'The next morning, he woke up feeling sick and realized he shouldn\'t have eaten that burrito.'],
        ['start' => 11.5, 'end' => 18,   'text' => 'He thought to himself, "I should have known better than to eat a spicy burrito before bed."'],

        ['start' => 19,   'end' => 25,   'text' => 'Later that day, Jack went to the doctor because he felt even worse.'],
        ['start' => 25.5, 'end' => 31,   'text' => 'The doctor asked him, "Did you eat something unusual last night?"'],
        ['start' => 31.5, 'end' => 36,   'text' => 'Jack replied, "I ate a burrito before bed."'],

        ['start' => 37,   'end' => 45,   'text' => 'The doctor said, "You shouldn\'t have done that. You should have known it would make you sick."'],
        ['start' => 46,   'end' => 53,   'text' => 'Jack thought to himself, "I shouldn\'t have eaten that burrito."'],
        ['start' => 53.5, 'end' => 62,   'text' => 'He also thought, "I should have listened to my mum when she told me not to eat spicy food before bed."'],

        ['start' => 63,   'end' => 70,   'text' => 'From that day on, Jack learned his lesson and never ate a burrito before bed again.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])