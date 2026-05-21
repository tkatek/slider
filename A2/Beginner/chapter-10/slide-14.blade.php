<?php

$content = [
    'title'    => 'Quick Practice',
    'subtitle' => 'Complete the sentences with (must / should / need to / important).',

    'instruction'      => '',
    'instruction_note' => 'Use must, should, need to, or important',

    'grid_class' => 'grid-cols-1 ',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'You '],
                [
                    'blank' => true,
                    'answer' => 'should',
                    'placeholder' => '',
                    'answers' => ['should'],
                ],
                ['text' => ' exercise to stay healthy.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'It’s '],
                [
                    'blank' => true,
                    'answer' => 'important',
                    'placeholder' => '',
                    'answers' => ['important'],
                ],
                ['text' => ' to sleep well.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'You '],
                [
                    'blank' => true,
                    'answer' => "shouldn't sit",
                    'placeholder' => '',
                    'answers' => ["shouldn't sit", 'should not sit'],
                ],
                ['text' => ' for many hours.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])
