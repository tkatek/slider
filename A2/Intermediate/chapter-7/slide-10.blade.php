<?php
$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening task',
    'title' => 'Listening task',
    'subtitle' => 'Are you going to do any of these things next year?',
    'instruction' => 'Listen. What are the people going to do? Check the boxes below.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-7/audios/slide10.mp3'),

    'transcript' => [
        "1. Christy Lewis: Well, I'm graduating from college next June so I guess I'll look for a job. I know it won't be easy to find one so I may go on for a master's degree. We'll see.",
        "2. Laura Chang: I'm not sure. I might look for a better job before that though. I'm going to ask my boss for a promotion but I probably won't get one so.",
        "3. Paul Reed: Well, some of my friends are going to travel around Europe for two months. I hope I'll be able to go with them but it'll be expensive and I might not be able to afford it.",
        "4. Jim and Katie Conley: We're going to have a baby in March so both of us will probably take some time off from work. I'm sure the baby will keep us both very busy.",
        "5. Joetta: I'm going to retire. I'll be 65 in June and my wife's already retired so we'll probably move to Florida in the fall or maybe Arizona. We're not going to spend another winter here, that's for sure.",
    ],

    'row_heading' => 'Person',

    'options' => [
        'have_baby' => 'Have a baby',
        'promotion' => 'Ask for a promotion',
        'graduate' => 'Graduate from college',
        'masters' => "Go on for a master's degree",
        'buy_house' => 'Buy a house',
        'trip' => 'Go on a trip',
        'retire' => 'Retire',
        'married' => 'Get married',
    ],

    'rows' => [
        [
            'number' => 1,
            'item' => 'Christy Lewis',
            'correct' => ['graduate', 'masters'],
        ],
        [
            'number' => 2,
            'item' => 'Laura Chang',
            'correct' => ['promotion'],
        ],
        [
            'number' => 3,
            'item' => 'Paul Reed',
            'correct' => ['trip'],
        ],
        [
            'number' => 4,
            'item' => 'Jim and Katie Conley',
            'correct' => ['have_baby'],
        ],
        [
            'number' => 5,
            'item' => 'Joetta',
            'correct' => ['retire'],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
