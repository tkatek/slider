<?php

$content = [
    'title'    => 'Practice 5',
    'subtitle' => '',

    'instruction'      => 'Rewrite Using the Word(s) Given',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '✏️',
            'parts' => [
                ['text' => 'It might scare her. (possible)'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "It's possible that it will scare her",
                    'answers' => [
                        "It's possible that it will scare her",
                        "It's possible that it will scare her.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✏️',
            'parts' => [
                ['text' => "I'm sure she'd like a teddy bear. (will)"],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She will like a teddy bear',
                    'answers' => [
                        'She will like a teddy bear',
                        'She will like a teddy bear.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✏️',
            'parts' => [
                ['text' => "I'm just not sure a painting set is a good idea. (might not)"],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'A painting set might not be a good idea',
                    'answers' => [
                        'A painting set might not be a good idea',
                        'A painting set might not be a good idea.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✏️',
            'parts' => [
                ['text' => "It won't scare her. (I'm sure)"],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "I'm sure it won't scare her",
                    'answers' => [
                        "I'm sure it won't scare her",
                        "I'm sure it won't scare her.",
                    ],
                ],
            ],
        ],

        [
            'speaker' => '✏️',
            'parts' => [
                ['text' => 'It might help her become more creative. (possible)'],
            ],
        ],
        [
            'speaker' => '✔',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "It's possible that it will help her become more creative",
                    'answers' => [
                        "It's possible that it will help her become more creative",
                        "It's possible that it will help her become more creative.",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])