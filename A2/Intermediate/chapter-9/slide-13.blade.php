<?php

$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to two conversations. People are talking about their future arrangements, then do the quiz.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Intermediate/chapter-9/audios/slide13.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Conversation 1',
        'Man: Why are you leaving early?',
        'Woman: I’m going to the dentist.',
        'Man: Why? Do you have a toothache?',
        'Woman: No, I’m getting my teeth cleaned.',
        'Man: Well, if you are leaving early, I’m leaving early too.',
        'Woman: Fine with me!',
        'Conversation 2',
        'Man: What are you doing tonight?',
        'Woman: I’m meeting my mom for dinner.',
        'Man: Oh! Where are you going?',
        'Woman: We are going to the new Thai restaurant. Join us!',
        'Man: Thanks, but I can’t. I’m playing futsal tonight.',
        'Woman: Well, maybe next time.',
    ],

    'questions' => [
        [
            'prompt'  => 'Where is the woman going?',
            'correct' => 'To the dentist',
            'options' => [
                'To the dentist',
                'To the doctor',
            ],
        ],
        [
            'prompt'  => 'What is the woman doing later?',
            'correct' => 'Having dinner with family',
            'options' => [
                'Playing futsal',
                'Having dinner with family',
            ],
        ],
        [
            'prompt'  => 'Why is the woman leaving early to visit the dentist?',
            'correct' => 'The woman is getting her teeth cleaned.',
            'options' => [
                'The woman has a toothache.',
                'The woman is getting a filling.',
                'The woman is getting her teeth cleaned.',
            ],
        ],
        [
            'prompt'  => 'If the woman in Conversation 2 invited the man to dinner at the Thai restaurant, what was his reason for declining?',
            'correct' => 'He is playing futsal tonight.',
            'options' => [
                'He is playing futsal tonight.',
                "He doesn't like Thai food.",
                'He has a dentist appointment.',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])