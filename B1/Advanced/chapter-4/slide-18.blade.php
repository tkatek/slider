<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => '',

    'instruction'      => 'Correct the mistakes.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',
    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Trees planted in the park.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Trees are being planted in the park.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'Trees are being planted in the park',
                        'Trees are being planted in the park.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Plastic waste are being collected from the beach.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Plastic waste is being collected from the beach.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'Plastic waste is being collected from the beach',
                        'Plastic waste is being collected from the beach.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'New recycling programs are start.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'New recycling programs are starting.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'New recycling programs are starting',
                        'New recycling programs are starting.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])