<?php
$content = [
    'title' => 'Let’s find out more about this day!',
    'type' => 'audio',
    'subtitle' => 'Do you know when is it celebrated?!',

    'audio' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-4.mp3'),

    'status_row_width' => 'max-w-5xl',
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        "Most people know about Mother’s Day and Father’s Day, but many people do not know about Parents’ Day.",
        'It started in 1994 in the United States.',
        'Bill Clinton made a law to celebrate it on the fourth Sunday of July.',
        'It is a special day to thank and support parents.',
        'On this day, parents and children celebrate each other.',
    ],

    'questions' => [
        [
            'prompt' => "When is Parents' Day celebrated in the United States?",
            'correct' => 'Fourth Sunday of July',
            'options' => [
                'Fourth Sunday of July',
                'Second Sunday of May',
                'Third Sunday of June',
            ],
        ],
        [
            'prompt' => "In which year was Parents' Day established in the United States?",
            'correct' => '1994',
            'options' => [
                '1984',
                '1994',
                '2004',
            ],
        ],
        [
            'prompt' => "Why is Parents' Day celebrated?",
            'correct' => 'To thank and support parents',
            'options' => [
                'To thank and support parents',
                'To give gifts to teachers',
                'To start the summer holiday',
            ],
        ],
    ],

    'sfx' => [
        'correct' => materialAsset('slider/sounds/correct.wav'),
        'wrong'   => materialAsset('slider/sounds/wrong.wav'),
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
