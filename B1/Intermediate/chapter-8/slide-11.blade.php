<?php

$content = [
    'title'    => 'Practice 4',
    'subtitle' => '',

    'instruction'      => 'Complete with who',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'A good friend is someone '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' listens carefully.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I like people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' are honest.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Friends are people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' help each other.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'We trust people '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' tell the truth.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'A supportive friend is someone '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' is there when we need help.'],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'She is the girl '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' always makes me laugh.'],
            ],
        ],
        [
            'speaker' => '7',
            'parts' => [
                ['text' => 'He is the boy '],
                [
                    'blank' => true,
                    'answer' => 'who',
                    'answers' => ['who'],
                ],
                ['text' => ' sits next to me in class.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])