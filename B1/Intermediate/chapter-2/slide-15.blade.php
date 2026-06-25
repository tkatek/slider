<?php

$content = [
    'title'    => 'Quick wrap up',
    'subtitle' => '',

    'instruction'      => 'Find & correct the mistake in this sentence
',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                [
                    'text' => "The ship's owners can’t have been very proud to see the Titanic in the water for the first time.",
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "The ship's owners must have been very proud to see the Titanic in the water for the first time.",
                    'placeholder' => "The ship's owners...",
                    'answers' => [
                        "The ship's owners must have been very proud to see the Titanic in the water for the first time.",
                        "The ship's owners must have been very proud to see the Titanic in the water for the first time",
                        "The ship’s owners must have been very proud to see the Titanic in the water for the first time.",
                        "The ship’s owners must have been very proud to see the Titanic in the water for the first time",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])