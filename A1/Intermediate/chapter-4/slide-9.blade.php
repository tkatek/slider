<?php
$content = [
    'title'      => 'Listening: short clinic dialogue',
    'subtitle'   => 'Practice 2',
    'type'       => 'audio',

    'audio'      => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide-9.mp3'),

    'script' => [
        "I feel terrible today. I ate too much last night and my stomach doesn’t feel well at all.
        \nYou should take something for it.",

        "This pain in my head is terrible.
        \nLet me get you some aspirin.
        \nThanks, That’s just what I need.",

        "I’m not going to school today. I’ve got to see the dentist. My tooth is really bothering me.
        \nOh, that’s too bad.",

        "I think I’ll stay in bed today. I think I hurt myself carrying those bags on the weekend. My back is killing me.
        \nCan I give you a massage? Maybe that will help.
        \nOh, yeah. Thanks. I’ll try anything.",

        "How do you feel?
        \nSorry. I can’t talk.
        \nLet me get you some hot lemon tea. That should help.
        \nThanks.",

        "I need to go to the drugstore. I have a bad cold and my head is all stuffed up.
        \nOh, that’s too bad. I hope you feel better soon.",


    ],

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'question_prompt_label'  => 'Choose the correct answer:',

    'questions' => [
        [
            'prompt'  => 'What is the problem in conversation 1?',
            'correct' => 'an upset stomach',
            'options' => ['an upset stomach', 'the flu'],
        ],
        [
            'prompt'  => 'What is the problem in conversation 2?',
            'correct' => 'a headache',
            'options' => ['a sore throat', 'a headache'],
        ],
        [
            'prompt'  => 'What is the problem in conversation 3?',
            'correct' => 'a toothache',
            'options' => ['a toothache', 'a cold'],
        ],
        [
            'prompt'  => 'What is the problem in conversation 4?',
            'correct' => 'a backache',
            'options' => ['a backache', 'a headache'],
        ],
        [
            'prompt'  => 'What is the problem in conversation 5?',
            'correct' => 'a sore throat',
            'options' => ['an upset stomach', 'a sore throat'],
        ],
        [
            'prompt'  => 'What is the problem in conversation 6?',
            'correct' => 'a cold',
            'options' => ['a cold', 'a backache'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
