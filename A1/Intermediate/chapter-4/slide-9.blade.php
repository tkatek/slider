<?php
$content = [
    'title'      => 'Listening: short clinic dialogue',
    'subtitle'   => 'Practice 2',
    'type'       => 'audio',

    'audio'      => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide9.mpeg'),

    'script' => [
        "I feel terrible today. I ate too much last night and my stomach doesn’t feel well at all.",
        'You should take something for it.',
        'This pain in my head is terrible.',
        'Let me get you some aspirin.',
        'Thanks. That’s just what I need.',
        'I’m not going to school today. I’ve got to see the dentist. My tooth is really bothering me.',
        'Oh, that’s too bad.',
        'I think I’ll stay in bed today. I think I hurt myself carrying those bags on the weekend. My back is killing me.',
        'Can I give you a massage? Maybe that will help.',
        'Oh, yeah. Thanks. I’ll try anything.',
        'How do you feel?',
        'Sorry. I can’t talk.',
        'Let me get you some hot lemon tea. That should help.',
        'Thanks.',
        'I need to go to the drugstore. I have a bad cold and my head is all stuffed up.',
        'Oh, that’s too bad. I hope you feel better soon.',
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
