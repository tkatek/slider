<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to the audio, find out what happened to Ahmed, and choose the correct answers.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Intermediate/chapter-4/slide8.mpeg'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Noura: So, how was your ski trip? Did you have a good time?',
        'Ahmed: Yeah, I guess. I sort of had an accident.',
        'Noura: Oh, really? What happened? Did you hurt yourself?',
        'Ahmed: Yeah, I broke my leg.',
        'Noura: Oh, no! How did it happen? I mean, what were you doing?',
        'Ahmed: Well, actually, I was talking on my cell phone....',
        'Noura: While you were skiing? That\'s kind of dangerous.',
        'Ahmed: Yeah, I know. But I was by myself, so I was lucky I had my cell to call for help.',
    ],

    'questions' => [
        [
            'prompt'  => 'What happened to Ahmed?',
            'correct' => '',
            'options' => null
        ],
        [
            'prompt'  => 'What was he doing when it happened?',
            'correct' => '',
            'options' => null
        ],
        [
            'prompt'  => 'What________you doing?',
            'correct' => 'were',
            'options' => [
                'were',
                'did',
            ],
        ],
        [
            'prompt'  => 'How____________ ?',
            'correct' => 'did it happen',
            'options' => [
                'did it happen',
                'was it happening',
            ],
        ],
        [
            'prompt'  => 'Did you hurt_________?',
            'correct' => 'yourself',
            'options' => [
                'yourself',
                'you',
            ],
        ],
        [
            'prompt'  => 'I don\'t enjoy skiing_______myself. Do you?',
            'correct' => 'by',
            'options' => [
                'by',
                'with',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])