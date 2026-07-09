<?php

$content = [

    'title'      => 'Listening',
    'subtitle'   => '',

    'instruction'      => 'Complete the Missing Expressions',
    'instruction_note' => 'Listen and complete the dialogue with ONE expression.',

    'audio' => materialAsset('slider/B1/Advanced/chapter-2/audios/slide18.mp3'),

    'transcript' => [
        'Aisha: Let’s go on holiday this June.',
        'Husband: Oh, I’m not sure I can get time off from work.',
        'Aisha: Can you ask your manager?',
        'Husband: Well, I know for a fact he will say “No.” He’s been in a bad mood all week. Have you asked your manager?',
        'Aisha: Not yet, but she will probably agree.',
        'Husband: Okay. I will try to ask him tomorrow, but I’d be surprised if he agrees.',
    ],

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I’m '],
                [
                    'blank' => true,
                    'answer' => 'not sure',
                    'answers' => ['not sure'],
                    'placeholder' => '',
                ],
                ['text' => ' I can get time off from work.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I know for a '],
                [
                    'blank' => true,
                    'answer' => 'fact',
                    'answers' => ['fact'],
                    'placeholder' => '',
                ],
                ['text' => ' he will say "No."'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'She will '],
                [
                    'blank' => true,
                    'answer' => 'probably',
                    'answers' => ['probably'],
                    'placeholder' => '',
                ],
                ['text' => ' agree.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'I’d be '],
                [
                    'blank' => true,
                    'answer' => 'surprised',
                    'answers' => ['surprised'],
                    'placeholder' => '',
                ],
                ['text' => ' if he agrees.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])