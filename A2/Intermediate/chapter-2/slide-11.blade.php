<?php

$content = [
    'title'    => 'Practice 3',
    'subtitle' => 'Rewrite the sentences, Use the passive',

    'instruction'      => 'Number 1 is done for you',
    'instruction_note' => 'Rewrite each sentence using the passive',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'They eat fruits.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Fruits are eaten by them.'],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'French people eat croissants for breakfast.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Croissants are eaten by French people for breakfast',
                    'placeholder' => 'Croissants...',
                    'answers' => [
                        'Croissants are eaten by French people for breakfast',
                        'Croissants are eaten by French people for breakfast.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Americans eat burger.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Burger is eaten by Americans',
                    'placeholder' => 'Burger...',
                    'answers' => [
                        'Burger is eaten by Americans',
                        'Burger is eaten by Americans.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'Egyptians eat Fool Medames for breakfast.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Fool Medames is eaten by Egyptians for breakfast',
                    'placeholder' => 'Fool Medames...',
                    'answers' => [
                        'Fool Medames is eaten by Egyptians for breakfast',
                        'Fool Medames is eaten by Egyptians for breakfast.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'Moroccan people make couscous.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Couscous is made by Moroccan people',
                    'placeholder' => 'Couscous...',
                    'answers' => [
                        'Couscous is made by Moroccan people',
                        'Couscous is made by Moroccan people.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])