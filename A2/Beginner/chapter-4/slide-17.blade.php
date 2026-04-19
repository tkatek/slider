<?php
$content = [
    'title'    => "Practice 6",
    'subtitle' => 'Listen again and answer the questions',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide17/dialogue.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Man: So what did you do yesterday?',
        'Woman: Nothing much, just chores. I washed the dishes, vacuumed, and mopped the floors.',
        'Man: Yeah, me too.',
        'Woman: Really, are you a clean freak?',
        'Man: Not so much, but my place needed a good cleaning.',
        'Woman: Was your place pretty dirty?',
        'Man: Yeah, it was pretty bad. But I cleaned the bathroom, picked up my dirty clothes, washed them and emptied the rubbish, so now it looks respectable.',
        'Woman: Yeah, you can only put things off for so long.',
        'Man: That’s right.',
    ],

    'questions' => [
        [
            'prompt'  => 'What did the woman do yesterday?',
            'correct' => 'She did chores',
            'options' => [
                'She went shopping',
                'She did chores',
                'She watched TV',
                'She visited a friend',
            ],
        ],
        [
            'prompt'  => 'What did the man clean?',
            'correct' => 'The bathroom and his clothes',
            'options' => [
                'Only the kitchen',
                'Only his clothes',
                'The bathroom and his clothes',
                'Nothing',
            ],
        ],
        [
            'prompt'  => 'How was the man’s place before cleaning?',
            'correct' => 'Very dirty',
            'options' => [
                'Very clean',
                'A little messy',
                'Very dirty',
                'New',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])