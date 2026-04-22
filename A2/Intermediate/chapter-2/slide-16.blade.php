<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Traditional food from different countries',

    'enable_image_zoom'      => false,
    'game_card_width'        => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale'            => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/burgers.webp'),
            'prompt'  => 'Burgers are from:',
            'correct' => 'The USA',
            'options' => ['The USA', 'Egypt', 'India'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/curry.webp'),
            'prompt'  => 'Curry is from:',
            'correct' => 'India',
            'options' => ['China', 'India', 'Canada'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/fish-chips.webp'),
            'prompt'  => 'Fish & chips are from:',
            'correct' => 'The UK',
            'options' => ['The USA', 'The UK', 'Taiwan'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/tacos.webp'),
            'prompt'  => 'Tacos are from:',
            'correct' => 'Mexico',
            'options' => ['Canada', 'Egypt', 'Mexico'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/pizza.webp'),
            'prompt'  => 'Pizza is from:',
            'correct' => 'Italy',
            'options' => ['France', 'Italy', 'Spain'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])