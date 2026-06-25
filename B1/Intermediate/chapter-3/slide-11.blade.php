<?php

$content = [
    'title'    => 'Practice 3',
    'subtitle' => '',

    'instruction'      => 'Look at the table again',
    'instruction_note' => 'Then write sentences using the prompts. First one is done for you',

    'grid_class' => 'grid-cols-1 lg:grid-cols-2',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                [
                    'text' => "it / rain / tomorrow (70%)",
                ],
            ],
        ],
        [
            'speaker' => '1',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "It might rain tomorrow.",
                    'placeholder' => "It might rain tomorrow",
                    'answers' => [
                        "It might rain tomorrow.",
                        "It might rain tomorrow",
                        "It may rain tomorrow.",
                        "It may rain tomorrow",
                        "It could rain tomorrow.",
                        "It could rain tomorrow",
                    ],
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'text' => "I / go to bed late tonight (0%)",
                ],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "I definitely won’t go to bed late tonight.",
                    'placeholder' => "I...",
                    'answers' => [
                        "I definitely won’t go to bed late tonight.",
                        "I definitely won’t go to bed late tonight",
                        "I definitely won't go to bed late tonight.",
                        "I definitely won't go to bed late tonight",
                        "I definitely will not go to bed late tonight.",
                        "I definitely will not go to bed late tonight",
                    ],
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'text' => "Jade / play computer games this evening (10%)",
                ],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => "Jade probably won’t play computer games this evening.",
                    'placeholder' => "Jade...",
                    'answers' => [
                        "Jade probably won’t play computer games this evening.",
                        "Jade probably won’t play computer games this evening",
                        "Jade probably won't play computer games this evening.",
                        "Jade probably won't play computer games this evening",
                        "Jade probably will not play computer games this evening.",
                        "Jade probably will not play computer games this evening",
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])