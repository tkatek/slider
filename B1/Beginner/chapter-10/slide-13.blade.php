<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct option to complete the sentences.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/1.webp'),
            'prompt'  => 'When I arrived at the station, the train . . . . . . . .',
            'correct' => 'had already left',
            'options' => ['had already left', 'already left'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/2.webp'),
            'prompt'  => 'We lit the candles because the lights . . . . . . . .',
            'correct' => 'had gone off',
            'options' => ['went off', 'had gone off'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/3.webp'),
            'prompt'  => 'When I got home, I discovered that somebody . . . . . . . . my flat.',
            'correct' => 'had broken into',
            'options' => ['broke into', 'had broken into'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/4.webp'),
            'prompt'  => 'When the dwarfs came home, the witch . . . . . . . .',
            'correct' => 'had already left',
            'options' => ['already left', 'had already left'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/5.webp'),
            'prompt'  => 'Billy . . . . . . . . all the cakes by the time the other children arrived.',
            'correct' => 'had eaten',
            'options' => ['had eaten', 'ate'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/6.webp'),
            'prompt'  => 'When she arrived at the theatre, he . . . . . . . . the tickets.',
            'correct' => 'had already bought',
            'options' => ['had already bought', 'already bought'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/7.webp'),
            'prompt'  => 'When he came home, she . . . . . . . . dinner.',
            'correct' => 'had already cooked',
            'options' => ['already cooked', 'had already cooked'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/8.webp'),
            'prompt'  => 'When I turned on the TV, the game . . . . . . . .',
            'correct' => 'had already finished',
            'options' => ['had already finished', 'already finished'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/9.webp'),
            'prompt'  => "John didn't catch the bus because he . . . . . . . . the house on time.",
            'correct' => "hadn't left",
            'options' => ["didn't leave", "hadn't left"],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide13/10.webp'),
            'prompt'  => "I didn't recognize Ellen at the party because I . . . . . . . . her for years.",
            'correct' => "hadn't seen",
            'options' => ["hadn't seen", "didn't see"],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])