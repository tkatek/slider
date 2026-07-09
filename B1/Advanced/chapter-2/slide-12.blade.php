<?php

$content = [
    'title'    => 'Practice 4',
    'subtitle' => '',

    'instruction'      => 'Correct the Mistake',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '✖',
            'parts' => [
                ['text' => "I'm sure she'd might like a teddy bear."],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "I'm sure she'd like a teddy bear",
                    'answers' => [
                        "I'm sure she'd like a teddy bear",
                        "I'm sure she'd like a teddy bear.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => "She must scare her. (meaning: It's only possible.)"],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She might scare her',
                    'answers' => [
                        'She might scare her',
                        'She might scare her.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => "It can't be a good idea. (meaning: Barbara isn't sure.)"],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'It might not be a good idea',
                    'answers' => [
                        'It might not be a good idea',
                        'It might not be a good idea.',
                        'It may not be a good idea',
                        'It may not be a good idea.',
                        "I'm just not sure it's a good idea",
                        "I'm just not sure it's a good idea.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'Susan must have scared me with a jack-in-the-box. (meaning: Isabelle knows Susan scared her.)'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Susan scared me with a jack-in-the-box',
                    'answers' => [
                        'Susan scared me with a jack-in-the-box',
                        'Susan scared me with a jack-in-the-box.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✖',
            'parts' => [
                ['text' => 'It mightn’t be much fun. (meaning: Mike is completely sure.)'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "It won't be much fun",
                    'answers' => [
                        "It won't be much fun",
                        "It won't be much fun.",
                        "It won’t be much fun",
                        "It won’t be much fun.",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])