<?php
$content = [
    'mode' => 'type_table',
    'page_title' => 'Listen again',
    'title' => 'Listen again',
    'subtitle' => '',
    'instruction' => 'Listen again. Write the correct information.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide9.mp3'),
    'transcript' => [
        "1",
        "Woman: You know, nodding your head - moving your head up and down - means “yes” in most places, but in one place I know of, it means “no.”",
        "Man: Well, in Brazil, where I’m from, it means “yes.” Where does nodding your head mean “no”?",
        "Woman: In Greece.",
        "Man: Hmm",

        "2",
        "Man: I didn’t know raising your eyebrows means “yes” in Tonga. It means something very different in Peru.",
        "Woman: Yeah? What does it mean in Peru?",
        "Man: “Money.” Raising your eyebrows is a gesture for “money” in Peru.",

        "3",
        "Woman: Um, Ramon, you said that tapping your head means “I’m thinking” in Argentina.",
        "Ramon: Yes, that’s right.",
        "Woman: You’d better be careful about using that gesture in Canada. It means “someone is crazy.”",
        "Ramon: It means “someone is crazy” in Canada? I didn’t know that. I’ll be careful.",
    ],

    'table_headers' => [
        'Where does the gesture mean...?',
        'country',
    ],

    'country_placeholder' => 'country',

    'rows' => [
        [
            'superstition' => '1. No',
            'answers' => [
                [
                    'country_answer' => 'Greece|greece',
                ],
            ],
        ],
        [
            'superstition' => '2. Money',
            'answers' => [
                [
                    'country_answer' => 'Peru|peru',
                ],
            ],
        ],
        [
            'superstition' => '3. Someone is crazy',
            'answers' => [
                [
                    'country_answer' => 'Canada|canada',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])