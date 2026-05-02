<?php
$content = [
    'title' => 'Listening',
    'subtitle' => '',

    'instruction' => 'Listen again & complete the sentences',
    'instruction_note' => 'Complete the Sentences',

    'audio' => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide10.mp3'),

    'script' => [
        'DIALOG 1',
        'Tom: Dad, are you afraid of anything?',
        'Dad: Well... nothing, really.',
        'Tom: That’s not true! You’re scared of spiders.',
        'Dad: Afraid? Scared? No, I’m terrified of them!',
        'Dad screams and runs away from a spider.',

        'DIALOG 2',
        'Dad: Hey, are you okay, Tom? You don’t look well.',
        'Tom: I feel nervous about my math test.',
        'Dad: You should relax and try to stay calm.',
        'Tom: Well then, can you help me study?',

        'DIALOG 3',
        'Tom: I’m so bored. There’s nothing to do.',
        'Dad: I’m surprised. Why don’t you watch TV?',
        'Tom: Huh?',
        'Dad: I hear there’s a great movie on Netflix called "Planet of the Grapes!" Let’s watch it!',
    ],

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'I feel '],
                ['blank' => true, 'answer' => 'nervous'],
                ['text' => ' about my test.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'I’m very '],
                ['blank' => true, 'answer' => 'scared'],
                ['text' => ' of spiders.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'I’m '],
                ['blank' => true, 'answer' => 'bored'],
                ['text' => '. There’s nothing to do.'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-missing-word', ['content' => $content])