<?php

$content = [
    'mode' => 'type_table',

    'page_title' => 'Listening task',
    'title'      => 'Listening task',
    'subtitle'   => 'Listen again and match the speaker to the statement.',

    'instruction'      => 'Listen. Then write the correct speaker.',
    'instruction_note' => '',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide17.mp3'),

    'transcript' => [
        'Sarah: Omar, have you ever watched a film and suddenly looked away during a scene?',
        'Omar: Yes, definitely! Why do you think that happens?',
        'Sarah: It can happen because of empathy. Sometimes we imagine how another person feels, and it affects us emotionally.',
        'Omar: Can you give me an example?',
        "Sarah: Sure. Imagine you're watching a film and something horrible is about to happen to a character. For example, someone is about to have their arm injured or their hand crushed.",
        'Omar: Oh, I know what you mean! I usually go, "Ugh!" and turn my head away.',
        "Sarah: Exactly. That's because your empathy is so strong that you can imagine what that experience might feel like if it happened to you.",
        "Omar: So, even though it isn't happening to me, I still react as if I can feel the pain?",
        "Sarah: That's right. Your brain helps you put yourself in the other person's situation.",
        'Omar: Are there any other examples of this?',
        'Sarah: Yes. Think about getting an injection or a vaccination.',
        'Omar: You mean when the needle goes into your arm?',
        'Sarah: Exactly. Some people feel uncomfortable even when they are just watching someone else get an injection.',
        "Omar: That's true! Sometimes I feel nervous just seeing the needle.",
        "Sarah: That's another example of empathy being triggered by something we see.",
        "Omar: So visual triggers can make us imagine another person's feelings or pain.",
        "Sarah: Yes, and that's one of the ways empathy works.",
    ],

    'table_headers' => [
        'Statement',
        'Speaker',
    ],

    'country_placeholder' => 'Speaker',

    'rows' => [
        [
            'superstition' => '"Can you give me an example?"',
            'answers' => [
                [
                    'country_answer' => 'Omar',
                ],
            ],
        ],
        [
            'superstition' => '"Your brain helps you put yourself in the other person’s situation."',
            'answers' => [
                [
                    'country_answer' => 'Sarah',
                ],
            ],
        ],
        [
            'superstition' => '"Sometimes I feel nervous just seeing the needle."',
            'answers' => [
                [
                    'country_answer' => 'Omar',
                ],
            ],
        ],
        [
            'superstition' => '"It can happen because of empathy."',
            'answers' => [
                [
                    'country_answer' => 'Sarah',
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])