<?php

$content = [
    'title'    => 'Practice 7',
    'subtitle' => 'Find the mistake in each sentence and correct it',

    'instruction'      => '',
    'instruction_note' => 'Number 1 is done for you',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => "I’m have a party for my birthday."],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                ['text' => "I’m having a party for my birthday."],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'She does a science test tomorrow.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She is doing a science test tomorrow.',
                    'answers' => [
                        'She is doing a science test tomorrow.',
                        "She's doing a science test tomorrow.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Are we visit Grandma tomorrow?'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Are we visiting Grandma tomorrow?',
                    'answers' => [
                        'Are we visiting Grandma tomorrow?',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'They’re not go to school next week.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'They’re not going to school next week.',
                    'answers' => [
                        'They’re not going to school next week.',
                        "They're not going to school next week.",
                        'They are not going to school next week.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'My brother takes me to a football match on Saturday.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'My brother is taking me to a football match on Saturday.',
                    'answers' => [
                        'My brother is taking me to a football match on Saturday.',
                        "My brother's taking me to a football match on Saturday.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'We’s having a picnic on Sunday.'],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'We’re having a picnic on Sunday.',
                    'answers' => [
                        'We’re having a picnic on Sunday.',
                        "We're having a picnic on Sunday.",
                        'We are having a picnic on Sunday.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '7',
            'parts' => [
                ['text' => 'I’m look after my friend’s cat at the weekend.'],
            ],
        ],
        [
            'speaker' => '7',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I’m looking after my friend’s cat at the weekend.',
                    'answers' => [
                        'I’m looking after my friend’s cat at the weekend.',
                        "I'm looking after my friend's cat at the weekend.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '8',
            'parts' => [
                ['text' => 'What is you do tonight?'],
            ],
        ],
        [
            'speaker' => '8',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'What are you doing tonight?',
                    'answers' => [
                        'What are you doing tonight?',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])