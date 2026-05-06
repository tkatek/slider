<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => '',

    'mode' => 'choice_table',

    'audio' => materialAsset('slider/A2/Advanced/chapter-4/audios/slide6.mp3'),

    'instruction' => 'Listen to 2 conversations about people’s personal experiences.',
    'instruction_note' => 'Tick the person who has done each experience. Then role-play the dialogues.',

    'row_heading'    => 'Experience',
    'option_heading' => 'Who has done it?',

    'options' => [
        'man'   => 'The Man',
        'woman' => 'The Woman',
    ],

    'rows' => [
        [
            'key'     => 'seen-star-wars',
            'label'   => 'Conversation 1: Movies',
            'item'    => 'Has seen all Star Wars movies.',
            'correct' => ['woman'],
        ],
        [
            'key'     => 'seen-spiderman',
            'label'   => 'Conversation 1: Movies',
            'item'    => 'Has seen all Spiderman movies.',
            'correct' => ['man'],
        ],
        [
            'key'     => 'seen-latest-spiderman',
            'label'   => 'Conversation 1: Movies',
            'item'    => 'Has seen the latest Spiderman movie.',
            'correct' => ['woman'],
        ],
        [
            'key'     => 'tried-new-cafe',
            'label'   => 'Conversation 2: The Café',
            'item'    => 'Has tried the new café.',
            'correct' => ['man'],
        ],
    ],

    'transcript' => [
        'Conversation 1',
        'Man: Have you seen the new Star Wars movie?',
        'Woman: Yes, I have seen them all.',
        'Man: Have you seen all the Spiderman movies?',
        'Woman: No, I haven’t. Have you?',
        'Man: Yes, I have seen them all except the latest one.',
        'Woman: Oh, I’ve seen that one! It’s good!',

        'Conversation 2',
        'Man: Have you tried the new café?',
        'Woman: No, I haven’t. I haven’t had time. Have you?',
        'Man: I have. It is really nice, but I’ve only been there once.',
        'Woman: I’ve heard it is really nice.',
        'Man: It is! They’ve done a nice job!',
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
