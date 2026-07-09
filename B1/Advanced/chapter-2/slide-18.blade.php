<?php
$content = [
    'mode' => 'choice_table',


    'title' => 'Listening',
    'subtitle' => '',

    'instruction' => 'Choose the Degree of Certainty',
    'instruction_note' => 'Listen and tick (✓) the correct degree of certainty.',

    'audio' => materialAsset('slider/B1/Advanced/chapter-2/audios/slide18.mp3'),

    'transcript' => [
        'Aisha: Let’s go on holiday this June.',
        'Husband: Oh, I’m not sure I can get time off from work.',
        'Aisha: Can you ask your manager?',
        'Husband: Well, I know for a fact he will say ‘no’. He’s been in a bad mood all week. Have you asked your manager?',
        'Aisha: Not yet, but she will probably agree.',
        'Husband: Okay. I will try to ask him tomorrow, but I’d be surprised if he agrees.',
    ],

    'row_heading' => 'Sentence',

    'options' => [
        'very_certain' => 'Very Certain',
        'likely'       => 'Likely',
        'not_sure'     => 'Not Sure',
    ],

    'rows' => [
        [
            'number'  => 1,
            'item'    => "I'm not sure I can get time off.",
            'correct' => 'not_sure',
        ],
        [
            'number'  => 2,
            'item'    => 'I know for a fact he will say no.',
            'correct' => 'very_certain',
        ],
        [
            'number'  => 3,
            'item'    => 'She will probably agree.',
            'correct' => 'likely',
        ],
        [
            'number'  => 4,
            'item'    => "I'd be surprised if he agrees.",
            'correct' => 'very_certain',
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])