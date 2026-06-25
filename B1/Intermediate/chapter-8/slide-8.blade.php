<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-8/img/slide8.webp'),
    'isQuiz'   => 1,

    'questions' => [
        [
            'time' => 7000,
            'type' => 'multiple_choice',
            'question' => 'How is friendship described in this video?',
            'options' => [
                'A way to become popular',
                'A bond between people who care for, help, and respect each other',
                'A relationship between family members only',
                'A way to earn money',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 26000,
            'type' => 'multiple_choice',
            'question' => 'What does empathy help us do?',
            'options' => [
                'Depend on honest people',
                'Give gifts to friends',
                'Understand people who may be feeling sad or worried',
                'Build boundaries',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 39000,
            'type' => 'multiple_choice',
            'question' => 'What does active listening mean?',
            'options' => [
                'Talking a lot to friends',
                'Giving full attention to someone who is speaking',
                'Sharing secrets with friends',
                'Helping friends with homework',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 62000,
            'type' => 'multiple_choice',
            'question' => 'A true friend is someone who ________.',
            'options' => [
                'Buys expensive gifts',
                'Always agrees with us',
                'Listens carefully and helps when needed',
                'Spends money on others',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'What does friendship need to become strong?',
            'options' => [
                'Expensive gifts',
                'Big gestures',
                'Effort from people who want to build a strong relationship',
                'Daily phone calls',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 7,
            'text' => 'Friendship is an important part of our lives. It is the bond between people who care for, help, and respect each other.',
        ],
        [
            'start' => 7.5,
            'end' => 16,
            'text' => 'Friendship makes us feel loved, safe, and supported. Good friends are people who make happy moments even better and difficult times easier.',
        ],
        [
            'start' => 16.5,
            'end' => 21,
            'text' => 'Strong friendships are built on important values.',
        ],
        [
            'start' => 21.5,
            'end' => 28,
            'text' => 'Empathy helps us understand people who may be feeling sad, worried, or upset.',
        ],
        [
            'start' => 28.5,
            'end' => 35,
            'text' => 'Trust helps us rely on friends who are honest and dependable.',
        ],
        [
            'start' => 35.5,
            'end' => 43,
            'text' => 'Active listening means giving full attention to someone who is speaking.',
        ],
        [
            'start' => 43.5,
            'end' => 50,
            'text' => 'Support means being there for friends who need our help or encouragement.',
        ],
        [
            'start' => 50.5,
            'end' => 55,
            'text' => 'So, how can we recognize a good friend?',
        ],
        [
            'start' => 55.5,
            'end' => 64,
            'text' => 'A true friend is someone who listens carefully, who shares with others, and who helps when we need support.',
        ],
        [
            'start' => 64.5,
            'end' => 72,
            'text' => 'Good friends are people who show kindness and who respect our feelings and boundaries.',
        ],
        [
            'start' => 72.5,
            'end' => 80,
            'text' => 'Friendship needs effort from people who want to build a strong relationship.',
        ],
        [
            'start' => 80.5,
            'end' => 91,
            'text' => 'Friendship doesn\'t need expensive gifts or big gestures. Sometimes, a friend who simply listens and stays by your side is enough.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])