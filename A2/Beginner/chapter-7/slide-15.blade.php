<?php

$content = [
    'title'    => 'Practice 7',
    'subtitle' => 'Listen to the conversation. Write the missing words.',

    'instruction'      => '',
    'instruction_note' => 'Fill in the missing words',

    'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide15/practice.mp3'),

    'grid_class' => 'grid-cols-1',

    'transcript' => [
        'A: What does your new boyfriend look like, Jenna?',
        "B: Well, he's really good looking.",
        'A: Oh! Is he tall?',
        "B: No, he isn't. He's pretty short.",
        'A: Really? Are you taller than him?',
        "B: No, we're about the same height. Let's see... and he has curly brown hair.",
        'A: He sounds cute. Is he about your age?',
        'B: Yes, he is. And we have the same birthday!',
    ],

    'lines' => [
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'What does your new boyfriend look like, Jenna?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => "Well, he's really good looking."],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Oh! '],
                [
                    'blank' => true,
                    'answer' => 'Is',
                    'answers' => ['Is', 'is'],
                ],
                ['text' => ' he tall?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'No',
                    'answers' => ['No', 'no'],
                ],
                ['text' => ', he '],
                [
                    'blank' => true,
                    'answer' => "isn't",
                    'answers' => ["isn't", 'is not'],
                ],
                ['text' => ". He's pretty short."],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Really? '],
                [
                    'blank' => true,
                    'answer' => 'Are',
                    'answers' => ['Are', 'are'],
                ],
                ['text' => ' you taller than him?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ["text" => "No, we're about the same height. Let's see... and he has curly brown hair."],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'He sounds cute. '],
                [
                    'blank' => true,
                    'answer' => 'Is',
                    'answers' => ['Is', 'is'],
                ],
                ['text' => ' '],
                [
                    'blank' => true,
                    'answer' => 'he',
                    'answers' => ['he'],
                ],
                ['text' => ' about your age?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Yes',
                    'answers' => ['Yes', 'yes'],
                ],
                ['text' => ', he '],
                [
                    'blank' => true,
                    'answer' => 'is',
                    'answers' => ['is'],
                ],
                ['text' => '. And we have the same birthday!'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])