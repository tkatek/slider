<?php

$content = [
    'title'    => 'Practice 5',
    'subtitle' => '',

    'instruction'      => 'Combine the sentences using the correct relative pronoun.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',
    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => 'a',
            'parts' => [
                ['text' => 'She is a scientist. She discovered a new medicine.'],
            ],
        ],
        [
            'speaker' => 'a',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'She is a scientist who discovered a new medicine',
                    'placeholder' => 'Write the full sentence',
                    'answers' => [
                        'She is a scientist who discovered a new medicine',
                        'She is a scientist who discovered a new medicine.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => 'b',
            'parts' => [
                ['text' => 'This is the park. I often go to this park.'],
            ],
        ],
        [
            'speaker' => 'b',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'This is the park where I often go',
                    'placeholder' => 'Write the full sentence',
                    'answers' => [
                        'This is the park where I often go',
                        'This is the park where I often go.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => 'c',
            'parts' => [
                ['text' => 'I read a book. The book is very inspiring.'],
            ],
        ],
        [
            'speaker' => 'c',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I read a book which is very inspiring',
                    'placeholder' => 'Write the full sentence',
                    'answers' => [
                        'I read a book which is very inspiring',
                        'I read a book which is very inspiring.',
                        'I read a book that is very inspiring',
                        'I read a book that is very inspiring.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => 'd',
            'parts' => [
                ['text' => 'We visited a town. The town is famous for its art.'],
            ],
        ],
        [
            'speaker' => 'd',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'We visited a town which is famous for its art',
                    'placeholder' => 'Write the full sentence',
                    'answers' => [
                        'We visited a town which is famous for its art',
                        'We visited a town which is famous for its art.',
                        'We visited a town that is famous for its art',
                        'We visited a town that is famous for its art.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => 'e',
            'parts' => [
                ['text' => 'I will never forget the moment. I won the competition.'],
            ],
        ],
        [
            'speaker' => 'e',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'I will never forget the moment when I won the competition',
                    'placeholder' => 'Write the full sentence',
                    'answers' => [
                        'I will never forget the moment when I won the competition',
                        'I will never forget the moment when I won the competition.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])