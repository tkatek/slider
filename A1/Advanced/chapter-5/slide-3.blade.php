<?php
$content = [
    'type'               => 'image',
    'page_title'         => 'Practice 1',
    'title'              => 'Practice 1',
    'subtitle'           => 'Warm-up',
    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/1.webp'),
            'prompt'  => 'He . . . . . . . a bike on the street.',
            'correct' => 'rides',
            'options' => ['ride', 'rides'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/2.webp'),
            'prompt'  => 'They . . . . . . . the train to work.',
            'correct' => 'take',
            'options' => ['take', 'takes'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/3.webp'),
            'prompt'  => 'I . . . . . . . to the library every morning.',
            'correct' => 'go',
            'options' => ['go', 'goes'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/4.webp'),
            'prompt'  => 'My brother Taylor . . . . . . . to the mall every weekend.',
            'correct' => 'drives',
            'options' => ['drive', 'drives'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/5.webp'),
            'prompt'  => 'She . . . . . . . a motorcycle.',
            'correct' => 'rides',
            'options' => ['ride', 'rides'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/6.webp'),
            'prompt'  => 'Tourists usually . . . . . . . taxis in New York.',
            'correct' => 'take',
            'options' => ['take', 'takes'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])