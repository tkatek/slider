<?php

$content = [
    'title' => 'Practice 7',
    'subtitle' => 'Find the mistake in each sentence and correct it<br>(Number 1 is done for you)',
    'stacked_full_input' => true,
    'stacked_grid_cols_2' => true,

    'questions' => [
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => "I’m have a party for my birthday.",
            'default_answer' => "I’m having a party for my birthday.",
            'locked' => true,
            'answers' => [
                "I’m having a party for my birthday.",
                "I'm having a party for my birthday.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'She does a science test tomorrow.',
            'answers' => [
                'She is doing a science test tomorrow.',
                "She's doing a science test tomorrow.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'Are we visit Grandma tomorrow?',
            'answers' => [
                'Are we visiting Grandma tomorrow?',
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'They’re not go to school next week.',
            'answers' => [
                'They’re not going to school next week.',
                "They're not going to school next week.",
                'They are not going to school next week.',
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'My brother takes me to a football match on Saturday.',
            'answers' => [
                'My brother is taking me to a football match on Saturday.',
                "My brother's taking me to a football match on Saturday.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'We’s having a picnic on Sunday.',
            'answers' => [
                'We’re having a picnic on Sunday.',
                "We're having a picnic on Sunday.",
                'We are having a picnic on Sunday.',
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'I’m look after my friend’s cat at the weekend.',
            'answers' => [
                'I’m looking after my friend’s cat at the weekend.',
                "I'm looking after my friend's cat at the weekend.",
            ],
        ],
        [
            'prefix' => '',
            'suffix' => '',
            'hint' => 'What is you do tonight?',
            'answers' => [
                'What are you doing tonight?',
            ],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])