<?php

$content = [
    'mode' => 'choice_table',

    'title'      => 'Listen Again',
    'subtitle'   => '',

    'instruction'      => 'Which services does the customer choose?',
    'instruction_note' => 'Listen again and Tick (✓)',

    // Use the complete conversation recording here.
    'audio' => materialAsset(
        'slider/B1/Advanced/chapter-1/audios/slide17.mp3'
    ),

    'transcript' => [
        'Beautician: Hi! How can I help you today?',
        "Customer: I'd like to get my hair trimmed a little. Just a basic trim.",
        "Beautician: Today's special includes a shampoo, haircut, styling, and a back massage for only $9.99.",
        "Customer: I don't have much time, but... okay. I'll have the complete service. Just don't cut too much.",
        "Beautician: No problem. Relax. You're in good hands.",
    ],

    'row_heading' => 'Service',

    // A single checkbox column.
    'options' => [
        'chosen' => '✓',
    ],

    'rows' => [
        [
            'number'  => 1,
            'item'    => 'Hair trim',
            'correct' => 'chosen',
        ],
        [
            'number'  => 2,
            'item'    => 'Shampoo',
            'correct' => 'chosen',
        ],
        [
            'number'  => 3,
            'item'    => 'Hair styling',
            'correct' => 'chosen',
        ],
        [
            'number'  => 4,
            'item'    => 'Back massage',
            'correct' => 'chosen',
        ],
        [
            'number'  => 5,
            'item'    => 'Facial',
            'correct' => null,
        ],
        [
            'number'  => 6,
            'item'    => 'Shave',
            'correct' => null,
        ],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])