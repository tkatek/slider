<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => '',

    'instruction'      => '🌍 Correct the Mistakes',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',
    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Riding a bike is more better than driving a car for the environment.'],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Riding a bike is better than driving a car for the environment.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'Riding a bike is better than driving a car for the environment',
                        'Riding a bike is better than driving a car for the environment.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Solar energy is one of more clean energy sources available today.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Solar energy is one of the cleanest energy sources available today.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'Solar energy is one of the cleanest energy sources available today',
                        'Solar energy is one of the cleanest energy sources available today.',
                    ],
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Planting trees is more effective way to improve air quality.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Planting trees is one of the most effective ways to improve air quality.',
                    'placeholder' => 'Write the correct sentence',
                    'answers' => [
                        'Planting trees is one of the most effective ways to improve air quality',
                        'Planting trees is one of the most effective ways to improve air quality.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])