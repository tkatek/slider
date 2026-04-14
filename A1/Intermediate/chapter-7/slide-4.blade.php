<?php
$content = [
    'title' => 'Can you guess what type of holiday this is?',
    'subtitle' => 'Choose the correct holiday type.',
    'type' => 'image',

    'enable_image_zoom' => false,
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/cruise.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'cruise',
            'options' => ['cruise', 'beach holiday', 'camping holiday'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/beach.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'beach holiday',
            'options' => ['safari', 'cruise', 'beach holiday'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/camping.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'camping holiday',
            'options' => ['camping holiday', 'hiking holiday', 'city break'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/mountains.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'hiking holiday',
            'options' => ['camping holiday', 'hiking holiday', 'culture holiday'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/historical-places.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'culture holiday',
            'options' => ['culture holiday', 'hiking holiday', 'city break'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/safari.webp'),
            'prompt' => 'What type of holiday is this?',
            'correct' => 'safari',
            'options' => ['safari', 'cruise', 'city break'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
