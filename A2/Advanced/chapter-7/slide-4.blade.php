<?php
$content = [
    'video'     => materialAsset('slider/A2/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-7/img/slide4.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 13000,
            'type' => 'multiple_choice',
            'question' => 'What can goal setting increase?',
            'options' => [
                'Money',
                'Productivity',
                'Free time',
                'Stress',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'What does “specific” mean in goal setting?',
            'options' => [
                'Easy goals',
                'Expensive goals',
                'Clear goals',
                'Long goals',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => 'What should attainable goals do?',
            'options' => [
                'Be impossible',
                'Stretch you but stay possible',
                'Take many years',
                'Be very easy',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'Why is a deadline important?',
            'options' => [
                'It saves money',
                'It makes goals smaller',
                'It creates urgency',
                'It changes the goal',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 59000,
            'type' => 'multiple_choice',
            'question' => 'What should you do after achieving a goal?',
            'options' => [
                'Stop working',
                'Change your job',
                'Celebrate and set a new goal',
                'Forget the goal',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 3,  'end' => 5,  'text' => 'Goal setting is a powerful tool in increasing productivity.'],
        ['start' => 5,  'end' => 9,  'text' => 'In fact, setting goals can increase your productivity by 11 to 25%.'],
        ['start' => 13, 'end' => 18, 'text' => 'But actually setting and working towards goals can be challenging. So let’s get smart about goals.'],
        ['start' => 18, 'end' => 24, 'text' => 'S: Specific. Ask yourself what you want to accomplish and most importantly why.'],
        ['start' => 24, 'end' => 30, 'text' => 'M: Measurable. Are you able to tell when you’ve reached your goal?'],
        ['start' => 30, 'end' => 36, 'text' => 'A: Attainable. Goals should stretch you so you feel excited but within your current ability.'],
        ['start' => 36, 'end' => 44, 'text' => 'R: Relevant. Set goals that are going to positively impact your life.'],
        ['start' => 44, 'end' => 47, 'text' => 'Does this goal fit in with your other life’s goals and dreams?'],
        ['start' => 47, 'end' => 52, 'text' => 'T: Time-based. A goal with a time deadline will create a sense of urgency.'],
        ['start' => 52, 'end' => 55, 'text' => 'And give you the energy you need to complete it.'],
        ['start' => 55, 'end' => 59, 'text' => 'Finally, once you achieve your goal, it’s time to celebrate and set the next goal.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])