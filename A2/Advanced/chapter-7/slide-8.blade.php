<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-7/video/goal-setting-encrypted/goal-setting.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-7/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            // After the productivity explanation ends at 9 seconds.
            // Silent gap: 9–10 seconds.
            'time' => 9200,
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
            // After the "Specific" explanation ends at 25 seconds.
            // Silent gap: 25–26 seconds.
            'time' => 25200,
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
            // After the "Attainable" explanation ends at 40 seconds.
            // Silent gap: 40–41 seconds.
            'time' => 40200,
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
            // After the complete time-based explanation ends at 62 seconds.
            // Silent gap: 62–62.5 seconds.
            'time' => 62100,
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
            // After the final subtitle ends at 70 seconds.
            'time' => 70200,
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
        ['start' => 0,  'end' => 4,  'text' => 'Goal setting is a powerful tool in increasing productivity.'],
        ['start' => 4,  'end' => 9,  'text' => 'In fact, setting goals can increase your productivity by 11 to 25%.'],
        ['start' => 10, 'end' => 16, 'text' => 'But actually setting and working towards goals can be challenging. So let’s get smart about goals.'],
        ['start' => 17.5, 'end' => 25, 'text' => 'S: Specific. Ask yourself what you want to accomplish and most importantly why.'],
        ['start' => 26, 'end' => 32, 'text' => 'M: Measurable. Are you able to tell when you’ve reached your goal?'],
        ['start' => 32.5, 'end' => 40, 'text' => 'A: Attainable. Goals should stretch you so you feel excited but within your current ability.'],
        ['start' => 41, 'end' => 47.5, 'text' => 'R: Relevant. Set goals that are going to positively impact your life.'],
        ['start' => 47.5, 'end' => 51, 'text' => 'Does this goal fit in with your other life’s goals and dreams?'],
        ['start' => 52.5, 'end' => 59.5, 'text' => 'T: Time-based. A goal with a time deadline will create a sense of urgency.'],
        ['start' => 59.5, 'end' => 62, 'text' => 'And give you the energy you need to complete it.'],
        ['start' => 62.5, 'end' => 70, 'text' => 'Finally, once you achieve your goal, it’s time to celebrate and set the next goal.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])