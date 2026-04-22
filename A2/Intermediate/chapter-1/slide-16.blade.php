<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Where is this traditional dress from?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kimono.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'Japan',
            'options' => ['Japan', 'Egypt', 'Morocco', 'Saudi Arabia'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sari.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'India',
            'options' => ['South Africa', 'India', 'China', 'Scotland'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kilt.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'Scotland',
            'options' => ['Morocco', 'Japan', 'Scotland', 'Egypt'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/thobe.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'Saudi Arabia',
            'options' => ['Saudi Arabia', 'China', 'India', 'South Africa'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/cheongsam.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'China',
            'options' => ['Egypt', 'Scotland', 'China', 'Morocco'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/egypt.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'Egypt',
            'options' => ['Japan', 'Egypt', 'Saudi Arabia', 'India'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/morocco.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'Morocco',
            'options' => ['Morocco', 'China', 'South Africa', 'Scotland'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/south-africa.webp'),
            'prompt'  => 'Where is this traditional dress from?',
            'correct' => 'South Africa',
            'options' => ['India', 'Saudi Arabia', 'Egypt', 'South Africa'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
