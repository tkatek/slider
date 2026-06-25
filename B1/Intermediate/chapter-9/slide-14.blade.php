<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => '',

    'instruction'      => 'Complete the sentences with who, that, which, where, or when.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 ',
    'card_class' => '[&_.lp-input]:!w-36 [&_.lp-input]:!min-w-0',

    'lines' => [
        [
            'speaker' => 'a',
            'parts' => [
                ['text' => 'The mentor '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who', 'that'],
                ],
                ['text' => ' helped me believe in myself changed my life.'],
            ],
        ],
        [
            'speaker' => 'b',
            'parts' => [
                ['text' => 'The workshop '],
                [
                    'blank' => true,
                    'answer' => 'which',
                    'answers' => ['which', 'that'],
                ],
                ['text' => ' I attended last weekend was very useful.'],
            ],
        ],
        [
            'speaker' => 'c',
            'parts' => [
                ['text' => 'This is the painting '],
                [
                    'blank' => true,
                    'answer' => 'which',
                    'answers' => ['which', 'that'],
                ],
                ['text' => ' my grandmother made.'],
            ],
        ],
        [
            'speaker' => 'd',
            'parts' => [
                ['text' => 'The people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who', 'that'],
                ],
                ['text' => ' surround us can inspire us every day.'],
            ],
        ],
        [
            'speaker' => 'e',
            'parts' => [
                ['text' => 'I was twelve years old '],
                [
                    'blank' => true,
                    'answer' => 'when',
                    'answers' => ['when'],
                ],
                ['text' => ' I decided to follow my passion.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])