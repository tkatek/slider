<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen and choose the feeling',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide10.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'DIALOG 1',
        'Tom: Dad, are you afraid of anything?',
        'Dad: Well... nothing, really.',
        'Tom: That’s not true! You’re scared of spiders.',
        'Dad: Afraid? Scared? No, I’m terrified of them!',
        'Dad screams and runs away from a spider.',

        'DIALOG 2',
        'Dad: Hey, are you okay, Tom? You don’t look well.',
        'Tom: I feel nervous about my math test.',
        'Dad: You should relax and try to stay calm.',
        'Tom: Well then, can you help me study?',

        'DIALOG 3',
        'Tom: I’m so bored. There’s nothing to do.',
        'Dad: I’m surprised. Why don’t you watch TV?',
        'Tom: Huh?',
        'Dad: I hear there’s a great movie on Netflix called "Planet of the Grapes!" Let’s watch it!',
    ],

    'questions' => [
        [
            'prompt'  => 'Dialog 1: What feeling matches the dialog?',
            'correct' => 'Scared',
            'options' => [
                'Happy',
                'Scared',
                'Bored',
            ],
        ],
        [
            'prompt'  => 'Dialog 2: What feeling matches the dialog?',
            'correct' => 'Nervous',
            'options' => [
                'Nervous',
                'Angry',
                'Excited',
            ],
        ],
        [
            'prompt'  => 'Dialog 3: What feeling matches the dialog?',
            'correct' => 'Bored',
            'options' => [
                'Bored',
                'Surprised',
                'Sad',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])