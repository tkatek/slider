<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Beginner/chapter-11/img/slide15.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'prompt'  => '1. What does James think about when he looks back at his life?',
            'correct' => 'His life could have been different if he had made other choices.',
            'options' => [
                'He wishes he had moved to another country.',
                'His life could have been different if he had made other choices.',
                'He regrets becoming a teacher.',
                'He wishes he had more friends.',
            ],
        ],
        [
            'prompt'  => '2. What would have happened if James had studied harder?',
            'correct' => 'He would have gone to a better university.',
            'options' => [
                'He would have traveled more.',
                'He would have gone to a better university.',
                'He would have moved to another town.',
                'He would have started a business.',
            ],
        ],
        [
            'prompt'  => '3. What does James regret about traveling?',
            'correct' => "He didn't travel enough when he was young.",
            'options' => [
                'He spent too much money.',
                'He traveled too often.',
                "He didn't travel enough when he was young.",
                "He didn't like other cultures.",
            ],
        ],
        [
            'prompt'  => '4. What advice from his parents did James ignore?',
            'correct' => 'To save money.',
            'options' => [
                'To study harder.',
                'To travel more.',
                'To save money.',
                'To find a better job.',
            ],
        ],
        [
            'prompt'  => '5. According to James, what would have happened if he had eaten better and exercised more?',
            'correct' => "He wouldn't have faced some health problems.",
            'options' => [
                'He would have become rich.',
                'He would have traveled more.',
                "He wouldn't have faced some health problems.",
                'He would have met more people.',
            ],
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 4,    'text' => "Hi, I'm James."],
        ['start' => 4.5,  'end' => 11,   'text' => 'When I think about my life, I realize things could have been different if I had made other choices.'],

        ['start' => 11.5, 'end' => 16,   'text' => "When I was a teenager, I didn't study very hard."],
        ['start' => 16.5, 'end' => 24,   'text' => 'If I had studied more, I would have gone to a better university and found a better job earlier.'],

        ['start' => 24.5, 'end' => 29,   'text' => "I also didn't travel much when I was young."],
        ['start' => 29.5, 'end' => 37,   'text' => 'If I had traveled more, I would have learned about different cultures and met interesting people.'],

        ['start' => 37.5, 'end' => 43,   'text' => "My parents often told me to save money, but I didn't listen."],
        ['start' => 43.5, 'end' => 50,   'text' => 'If I had saved more, I would have had more savings now.'],

        ['start' => 50.5, 'end' => 55,   'text' => "I also didn't take good care of my health."],
        ['start' => 55.5, 'end' => 64,   'text' => "If I had eaten better and exercised more, I wouldn't have faced some health problems today."],

        ['start' => 64.5, 'end' => 70,   'text' => 'Even though I made mistakes, I have learned a lot from them.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])