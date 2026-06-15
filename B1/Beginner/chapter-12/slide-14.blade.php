<?php

$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-12/img/slide14.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 6500,
            'type' => 'multiple_choice',
            'question' => '“I should have come to see you first.” What does it mean?',
            'options' => [
                'Not visiting someone first',
                'Losing a phone',
                'Missing a train',
                'Forgetting a birthday',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => '“You should have told me who you really are.” What does it mean?',
            'options' => [
                'Arriving late',
                'Hiding the truth',
                'Spending too much money',
                'Forgetting homework',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 43000,
            'type' => 'multiple_choice',
            'question' => '“You should have stayed out.” What does it mean?',
            'options' => [
                'Going inside when you shouldn’t have',
                'Losing your keys',
                'Missing a bus',
                'Eating unhealthy food',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 49000,
            'type' => 'multiple_choice',
            'question' => '“You should have left it in the ocean.” What does it mean?',
            'options' => [
                'Taking something that should not have been taken',
                'Missing a meeting',
                'Being rude to a friend',
                'Not studying enough',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 55000,
            'type' => 'multiple_choice',
            'question' => '“I guess I should have listened.” What does it mean?',
            'options' => [
                'Ignoring good advice',
                'Driving too fast',
                'Waking up late',
                'Forgetting a password',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 81000,
            'type' => 'multiple_choice',
            'question' => '“I never should have left you there.” What does it mean?',
            'options' => [
                'Leaving someone alone',
                'Missing a flight',
                'Losing money',
                'Breaking a promise',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 87000,
            'type' => 'multiple_choice',
            'question' => '“He never should have said goodbye.” What does it mean?',
            'options' => [
                'Leaving too soon or ending a relationship',
                'Not answering a message',
                'Being late for work',
                'Forgetting an appointment',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 4,    'text' => 'I should have come to see you first.'],
        ['start' => 4.5,  'end' => 8,    'text' => 'You should have gone for the head.'],
        ['start' => 8.5,  'end' => 13,   'text' => 'You should have left your armor on for that. Yeah.'],

        ['start' => 14,   'end' => 17,   'text' => 'I should have gone to you.'],
        ['start' => 17.5, 'end' => 21,   'text' => 'We should have seen this coming.'],
        ['start' => 21.5, 'end' => 25,   'text' => 'And that should have been the end of it.'],

        ['start' => 26,   'end' => 29,   'text' => 'You should have seen your face.'],
        ['start' => 29.5, 'end' => 32,   'text' => 'Man, you should have seen them.'],
        ['start' => 32.5, 'end' => 36.5, 'text' => 'You should have told me who you really are.'],

        ['start' => 37,   'end' => 40.5, 'text' => 'Do you think I should have told them?'],
        ['start' => 41,   'end' => 44,   'text' => 'You should have stayed out.'],
        ['start' => 44.5, 'end' => 48,   'text' => 'You should have left it in the ocean.'],

        ['start' => 49,   'end' => 52.5, 'text' => 'Perhaps you should have done the same.'],
        ['start' => 53,   'end' => 56,   'text' => 'I guess I should have listened.'],
        ['start' => 56.5, 'end' => 59,   'text' => 'I never should have left.'],

        ['start' => 60,   'end' => 65,   'text' => 'You were at 16 when it should have said 76.'],
        ['start' => 65.5, 'end' => 67,   'text' => 'Сестра.'],
        ['start' => 67.5, 'end' => 71,   'text' => 'I should have come back for you.'],

        ['start' => 72,   'end' => 76,   'text' => 'I never should have left you there.'],
        ['start' => 76.5, 'end' => 80,   'text' => 'He never should have said goodbye.'],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])