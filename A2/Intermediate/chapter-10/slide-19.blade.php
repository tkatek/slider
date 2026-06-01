<?php

$content = [
    'title'    => 'Practice 7',
    'subtitle' => '',

    'instruction'      => 'Choose the correct answer',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I need to call '],
                [
                    'blank' => true,
                    'answer' => 'back',
                    'answers' => ['back'],
                    'placeholder' => 'out / back / on / up',
                ],
                ['text' => ' my mom later. She called while I was busy.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => "Please don't hang "],
                [
                    'blank' => true,
                    'answer' => 'up',
                    'answers' => ['up'],
                    'placeholder' => 'up / out / down / on',
                ],
                ['text' => ' yet! I have one more question.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Sorry to interrupt. Please go '],
                [
                    'blank' => true,
                    'answer' => 'on',
                    'answers' => ['on'],
                    'placeholder' => 'up / on / out / off',
                ],
                ['text' => ' with your story.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'The phone line was cut '],
                [
                    'blank' => true,
                    'answer' => 'off',
                    'answers' => ['off'],
                    'placeholder' => 'up / off / on / out',
                ],
                ['text' => ' during our conversation.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'The connection is '],
                [
                    'blank' => true,
                    'answer' => 'too',
                    'answers' => ['too', 'very'],
                    'placeholder' => 'to / too / very',
                ],
                ['text' => " weak. I can't hear you."],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])