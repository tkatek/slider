<?php

$content = [
    'title'    => 'Quick wrap-up!',
    'subtitle' => '',

    'instruction'      => 'Complete the sentences with a suitable modal of deduction:',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                [
                    'text' => "Who do you think ________ win the next World Cup?",
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "Who do you think will win the next World Cup?",
                    'placeholder' => "Who do you think...",
                    'answers' => [
                        "Who do you think will win the next World Cup?",
                        "Who do you think will win the next World Cup",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])