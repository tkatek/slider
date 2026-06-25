<?php

$content = [
    'title'    => 'Complete with WHO',
    'subtitle' => 'Rewrite the sentences using who.',

    'instruction'      => 'Example',
    'instruction_note' => 'Allison is fun to be with. → Allison is someone who is fun to be with.',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Ted Roberts wants to spend his life surfing.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Ted Roberts is a person who wants to spend his life surfing',
                    'placeholder' => 'Ted Roberts is a person...',
                    'answers' => [
                        'Ted Roberts is a person who wants to spend his life surfing',
                        'Ted Roberts is a person who wants to spend his life surfing.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Tony Lee is embarrassing to be with.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Tony Lee is someone who is embarrassing to be with',
                    'placeholder' => 'Tony Lee is someone...',
                    'answers' => [
                        'Tony Lee is someone who is embarrassing to be with',
                        'Tony Lee is someone who is embarrassing to be with.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Sandra Bronstein has famous and successful parents.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Sandra Bronstein is a person who has famous and successful parents',
                    'placeholder' => 'Sandra Bronstein is a person...',
                    'answers' => [
                        'Sandra Bronstein is a person who has famous and successful parents',
                        'Sandra Bronstein is a person who has famous and successful parents.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])