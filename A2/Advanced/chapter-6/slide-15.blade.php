<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Choose the correct word.',

    'enable_image_zoom'      => false,
    'game_card_width'        => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale'            => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide15/1.webp'),
            'prompt'  => 'Paul has lived in London . . . . . ten years.',
            'correct' => 'for',
            'options' => ['for', 'since'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide15/2.webp'),
            'prompt'  => 'Sarah has lived in Paris . . . . . 1995.',
            'correct' => 'since',
            'options' => ['for', 'since'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide15/3.webp'),
            'prompt'  => 'Daniel has been in Hong Kong . . . . . 2001.',
            'correct' => 'since',
            'options' => ['for', 'since'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide15/4.webp'),
            'prompt'  => "I've been a nurse . . . . . ten years.",
            'correct' => 'for',
            'options' => ['for', 'since'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide15/5.webp'),
            'prompt'  => "Jane is in London. She's been there . . . . . Friday.",
            'correct' => 'since',
            'options' => ['for', 'since'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
