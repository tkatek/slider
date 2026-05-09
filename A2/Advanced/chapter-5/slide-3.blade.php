<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 1: Warm-up',
    'title'      => 'Practice 1: Warm-up',
    'subtitle'   => 'What have you done?!',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide3/eaten.webp'),
            'prompt'  => 'What have you eaten?',
            'correct' => 'I have eaten spinach.',
            'options' => ['I eat spinach.', 'I have eaten spinach.'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide3/drunk.webp'),
            'prompt'  => 'What have you drunk?',
            'correct' => 'I have drunk soda.',
            'options' => ['I drink soda.', 'I have drunk soda.'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide3/heard.webp'),
            'prompt'  => 'What have you heard?',
            'correct' => 'I have heard a noise.',
            'options' => ['I have heard a noise.', 'I have hear a noise.'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide3/seen.webp'),
            'prompt'  => 'What have you seen?',
            'correct' => 'I have seen a film.',
            'options' => ['I has seen a film.', 'I have seen a film.'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide3/done.webp'),
            'prompt'  => 'What have you done?',
            'correct' => 'I have done the homework.',
            'options' => ['I am done the homework.', 'I have done the homework.'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
