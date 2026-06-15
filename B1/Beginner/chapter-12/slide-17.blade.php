<?php

$content = [
    'title'    => 'Reading',
    'subtitle' => 'Read & write a response for each sentence with should / shouldn’t have and the verbs in the box.',

    'instruction'      => '',
    'instruction_note' => 'set off earlier / not wear high heels / not stay up late / not pack so much stuff / apply for it earlier',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'We missed our ferry to France. We '],
                [
                    'blank' => true,
                    'answer' => 'should have set off earlier',
                    'answers' => ['should have set off earlier'],
                ],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'My feet were killing me by the time we got home. You '],
                [
                    'blank' => true,
                    'answer' => 'shouldn’t have worn high heels',
                    'answers' => [
                        'shouldn’t have worn high heels',
                        "shouldn't have worn high heels",
                        'should not have worn high heels',
                    ],
                ],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Jack’s visa didn’t arrive in time for his trip. He '],
                [
                    'blank' => true,
                    'answer' => 'should have applied for it earlier',
                    'answers' => ['should have applied for it earlier'],
                ],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'I hurt my back while lifting my suitcase. I '],
                [
                    'blank' => true,
                    'answer' => 'shouldn’t have packed so much stuff',
                    'answers' => [
                        'shouldn’t have packed so much stuff',
                        "shouldn't have packed so much stuff",
                        'should not have packed so much stuff',
                    ],
                ],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'I feel completely exhausted today. You '],
                [
                    'blank' => true,
                    'answer' => 'shouldn’t have stayed up late',
                    'answers' => [
                        'shouldn’t have stayed up late',
                        "shouldn't have stayed up late",
                        'should not have stayed up late',
                    ],
                ],
                ['text' => '.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])