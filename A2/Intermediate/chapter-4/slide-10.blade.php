<?php
$content = [
    'title'    => "Practice 4",
    'subtitle' => 'Find the mistake in each sentence',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'questions' => [
        [
            'prompt'  => 'I were studying Maths at 6 o’clock yesterday.',
            'correct' => 'Wrong',
            'options' => ['Correct', 'Wrong'],
            'audio'   => null,
            'script'  => [
                'I were studying Maths at 6 o’clock yesterday.',
            ],
        ],
        [
            'prompt'  => 'My dad was washing the dishes at 5 in the evening.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Wrong'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/2.mp3"),
            'script'  => [
                'My dad was washing the dishes at 5 in the evening.',
            ],
        ],
        [
            'prompt'  => 'My grandpa was looked for his glasses all day.',
            'correct' => 'Wrong',
            'options' => ['Correct', 'Wrong'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/3.mp3"),
            'script'  => [
                'My grandpa was looked for his glasses all day.',
            ],
        ],
        [
            'prompt'  => 'My mum and I was watching TV at 8 p.m.',
            'correct' => 'Wrong',
            'options' => ['Correct', 'Wrong'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/4.mp3"),
            'script'  => [
                'My mum and I was watching TV at 8 p.m.',
            ],
        ],
        [
            'prompt'  => 'Fred was played video games 10 minutes ago.',
            'correct' => 'Wrong',
            'options' => ['Correct', 'Wrong'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/5.mp3"),
            'script'  => [
                'Fred was played video games 10 minutes ago.',
            ],
        ],
        [
            'prompt'  => 'My sister was doing her homework at 4 o’clock.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Wrong'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/6.mp3"),
            'script'  => [
                'My sister was doing her homework at 4 o’clock.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])