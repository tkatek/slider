<?php

$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to four people talking about things they did and now regret. Choose the correct answer.',
    'type'     => 'questions_only',

    'audio'   => materialAsset("slider/B1/Beginner/chapter-12/audios/slide15.mp3"),

    'script'  => [
        'Learning from Mistakes',
        'Emma: Last year, I missed a flight for a job interview. I should have left home earlier and packed my things the night before. The train was late, and I arrived after the gate had closed.',
        "Tyler: I had an argument with my best friend. I should have listened more carefully and stayed calm. I shouldn't have shouted at him. Luckily, we became friends again.",
        "James: At work, a new colleague was having a difficult time. I saw that she was stressed, but I didn't help her. I should have offered my support. Later, she left the company, and I felt bad.",
        "Maya: I didn't go to a family gathering because I was tired. I should have gone because my grandmother was there. A few months later, she passed away. I really regret not spending time with her.",
    ],

    'questions' => [
        [
            'prompt'  => 'Why did Emma miss her flight?',
            'correct' => 'She left home too late.',
            'options' => [
                'She forgot her passport.',
                'She left home too late.',
                'She went to the wrong airport.',
                'Her interview was canceled.',
            ],
        ],
        [
            'prompt'  => 'What does Tyler regret?',
            'correct' => 'Arguing with his friend.',
            'options' => [
                'Missing a flight.',
                'Leaving his job.',
                'Arguing with his friend.',
                'Missing a family event.',
            ],
        ],
        [
            'prompt'  => 'What should James have done?',
            'correct' => 'Helped his colleague.',
            'options' => [
                'Worked longer hours.',
                'Found a new job.',
                'Helped his colleague.',
                'Talked to his manager.',
            ],
        ],
        [
            'prompt'  => 'Why does Maya regret her decision?',
            'correct' => "She didn't visit her grandmother.",
            'options' => [
                'She missed a party.',
                'She lost her job.',
                "She didn't visit her grandmother.",
                'She missed a flight.',
            ],
        ],
        [
            'prompt'  => 'What is the main lesson in all four stories?',
            'correct' => 'Learn from past mistakes.',
            'options' => [
                'Travel more often.',
                'Save more money.',
                'Learn from past mistakes.',
                'Work harder.',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])