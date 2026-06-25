<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen & choose the correct answer:',
    'type' => 'questions_only',

    'audio' => materialAsset('slider/B1/Beginner/chapter-11/audios/slide18.mp3'),

    'script' => [
        "Hi, I'm James. When I think about my life, I realize things could have been different if I had made other choices.",
        "When I was a teenager, I didn't study very hard. If I had studied more, I would have gone to a better university and found a better job earlier.",
        "I also didn't travel much when I was young. If I had traveled more, I would have learned about different cultures and met interesting people.",
        "My parents often told me to save money, but I didn't listen. If I had saved more, I would have had more savings now.",
        "I also didn't take good care of my health. If I had eaten better and exercised more, I wouldn't have faced some health problems today.",
        "Even though I made mistakes, I have learned a lot from them.",
    ],

    'questions' => [
        [
            'prompt'  => 'What does James think about when he looks back at his life?',
            'correct' => 'His life could have been different if he had made other choices.',
            'options' => [
                'He wishes he had moved to another country.',
                'His life could have been different if he had made other choices.',
                'He regrets becoming a teacher.',
                'He wishes he had more friends.',
            ],
        ],
        [
            'prompt'  => 'What would have happened if James had studied harder?',
            'correct' => 'He would have gone to a better university.',
            'options' => [
                'He would have traveled more.',
                'He would have gone to a better university.',
                'He would have moved to another town.',
                'He would have started a business.',
            ],
        ],
        [
            'prompt'  => 'What does James regret about traveling?',
            'correct' => "He didn't travel enough when he was young.",
            'options' => [
                'He spent too much money.',
                'He traveled too often.',
                "He didn't travel enough when he was young.",
                "He didn't like other cultures.",
            ],
        ],
        [
            'prompt'  => 'What advice from his parents did James ignore?',
            'correct' => 'To save money.',
            'options' => [
                'To study harder.',
                'To travel more.',
                'To save money.',
                'To find a better job.',
            ],
        ],
        [
            'prompt'  => 'According to James, what would have happened if he had eaten better and exercised more?',
            'correct' => "He wouldn't have faced some health problems.",
            'options' => [
                'He would have become rich.',
                'He would have traveled more.',
                "He wouldn't have faced some health problems.",
                'He would have met more people.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])