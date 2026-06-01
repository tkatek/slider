<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen again and complete the sentences with the correct verb form',
    'grid_class' => 'grid-cols-1 lg:grid-cols-2',
    'audio'      => materialAsset('slider/A2/Intermediate/chapter-7/audios/slide10.mp3'),

    'instruction'      => '',
    'instruction_note' => 'Number one is done for you.',

    'transcript' => [
        "Christy Lewis: Well, I'm graduating from college next June so I guess I'll look for a job. I know it won't be easy to find one so I may go on for a master's degree. We'll see.",
        "Laura Chang: I'm not sure. I might look for a better job before that though. I'm going to ask my boss for a promotion but I probably won't get one so.",
        "Paul Reed: Well, some of my friends are going to travel around Europe for two months. I hope I'll be able to go with them but it'll be expensive and I might not be able to afford it.",
        "Jim and Katie Conley: We're going to have a baby in March so both of us will probably take some time off from work. I'm sure the baby will keep us both very busy.",
        "Joetta: I'm going to retire. I'll be 65 in June and my wife's already retired so we'll probably move to Florida in the fall or maybe Arizona. We're not going to spend another winter here, that's for sure.",
    ],

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Paul says it '],
                [
                    'blank' => true,
                    'answer' => 'will',
                    'answers' => ['will'],
                    'placeholder' => 'will',
                ],
                ['text' => " be expensive to go to Europe. He’s sure about that."],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Laura thinks she probably '],
                [
                    'blank' => true,
                    'answer' => "won't",
                    'answers' => ["won't", 'will not'],
                    'placeholder' => '',
                ],
                ['text' => " get a promotion. She’s 95% certain her boss will say no."],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Christy says she '],
                [
                    'blank' => true,
                    'answer' => 'may',
                    'answers' => ['may'],
                    'placeholder' => '',
                ],
                ['text' => " study for a master’s degree. She’s not sure, though."],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'Laura says she '],
                [
                    'blank' => true,
                    'answer' => 'might',
                    'answers' => ['might'],
                    'placeholder' => '',
                ],
                ['text' => " look for a better job. She says it’s possible."],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'Joe says he '],
                [
                    'blank' => true,
                    'answer' => 'is going to',
                    'answers' => ['is going to'],
                    'placeholder' => '',
                ],
                ['text' => " retire next June. He’s already decided."],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])