<?php

$content = [
    'title'    => 'Reading Comprehension',
    'subtitle' => 'Read Becky’s regrets and complete the sentences:<br><br>I didn’t study much at school, so I didn’t pass my exams. It was difficult to find a job because I didn’t have any qualifications. I got married very young and I made the wrong decision. I had three children so I stayed at home and didn’t work. I got divorced when the children were small so I went to live with my mother. I didn’t meet another partner because I wasn’t able to go out. I never went abroad because I was always broke. I’ve had a hard life.',

    'instruction'      => '',
    'instruction_note' => 'Complete the sentences',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had studied',
                    'answers' => ['had studied'],
                ],
                ['text' => ' more at school, she '],
                [
                    'blank' => true,
                    'answer' => 'would have passed',
                    'answers' => ['would have passed'],
                ],
                ['text' => ' her exams.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had had',
                    'answers' => ['had had'],
                ],
                ['text' => ' some qualifications, she '],
                [
                    'blank' => true,
                    'answer' => 'would have found',
                    'answers' => ['would have found'],
                ],
                ['text' => ' a job more easily.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t got married',
                    'answers' => ['hadn’t got married', "hadn't got married"],
                ],
                ['text' => ' so young, she '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have made',
                    'answers' => ['wouldn’t have made', "wouldn't have made"],
                ],
                ['text' => ' the wrong decision.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have stayed',
                    'answers' => ['wouldn’t have stayed', "wouldn't have stayed"],
                ],
                ['text' => ' at home if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t had',
                    'answers' => ['hadn’t had', "hadn't had"],
                ],
                ['text' => ' three children.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have gone',
                    'answers' => ['wouldn’t have gone', "wouldn't have gone"],
                ],
                ['text' => ' to live with her mother if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t got',
                    'answers' => ['hadn’t got', "hadn't got"],
                ],
                ['text' => ' divorced.'],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had been able',
                    'answers' => ['had been able'],
                ],
                ['text' => ' to go out, she '],
                [
                    'blank' => true,
                    'answer' => 'would have met',
                    'answers' => ['would have met'],
                ],
                ['text' => ' another partner.'],
            ],
        ],
        [
            'speaker' => '7',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'would have gone',
                    'answers' => ['would have gone'],
                ],
                ['text' => ' abroad if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t always been',
                    'answers' => ['hadn’t always been', "hadn't always been", 'hadn’t been', "hadn't been"],
                ],
                ['text' => ' broke.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])