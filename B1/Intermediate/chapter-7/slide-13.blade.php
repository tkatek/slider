<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct answer:',

    'questions' => [
        [
            'emoji' => '✅',
            'prompt' => 'What does “responsible” mean?',
            'correct' => 'Doing duties carefully',
            'options' => [
                'Not caring about rules',
                'Doing duties carefully',
                'Always joking',
                'Avoiding work',
            ],
        ],
        [
            'emoji' => '🤸',
            'prompt' => 'A “flexible” person is someone who…',
            'correct' => 'Changes easily in different situations',
            'options' => [
                'Never changes opinions',
                'Changes easily in different situations',
                'Is always strict',
                'Avoids people',
            ],
        ],
        [
            'emoji' => '🧍',
            'prompt' => '“Independent” means…',
            'correct' => 'Can do things alone',
            'options' => [
                'Needs help all the time',
                'Likes working in teams only',
                'Can do things alone',
                'Never makes decisions',
            ],
        ],
        [
            'emoji' => '👀',
            'prompt' => 'If someone is “less noticed,” they…',
            'correct' => 'Are often ignored',
            'options' => [
                'Get more attention',
                'Are often ignored',
                'Are always leaders',
                'Talk too much',
            ],
        ],
        [
            'emoji' => '⚡',
            'prompt' => 'A “risk-taking” person usually…',
            'correct' => 'Tries new and exciting things',
            'options' => [
                'Avoids new things',
                'Likes safe routines only',
                'Tries new and exciting things',
                'Never changes habits',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])