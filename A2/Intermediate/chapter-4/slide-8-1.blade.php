<?php
$content = [
    'title'    => 'Listen Again',
    'subtitle' => 'Listen again & choose the correct answer.',
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
        'Ahmed: Well, actually, I was talking on my cell phone...',
        "Noura: While you were skiing? That's kind of dangerous.",
        'Ahmed: Yeah, I know. But I was by myself, so I was lucky I had my cell to call for help.',
    ],

    'questions' => [
        [
            'prompt'  => 'What _____ you doing?',
            'correct' => 'were',
            'options' => [
                'were',
                'did',
            ],
        ],
        [
            'prompt'  => 'How _____?',
            'correct' => 'did it happen',
            'options' => [
                'did it happen',
                'was it happening',
            ],
        ],
        [
            'prompt'  => 'Did you hurt _____?',
            'correct' => 'yourself',
            'options' => [
                'yourself',
                'you',
            ],
        ],
        [
            'prompt'  => "I don't enjoy skiing _____ myself. Do you?",
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