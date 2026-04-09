<?php
$content = [
    'uid' => 'holiday_type_' . substr(md5(uniqid('', true)), 0, 10),
    'type' => 'image',
    'page_title' => 'Practice 2',
    'title' => 'Can you guess what type of holiday this is?',
    'subtitle' => 'Choose the correct holiday type.',
    'question_prompt_label' => 'Pick the correct holiday type:',
    'enable_image_zoom' => false,
    'image_plain' => true,
    'image_scale' => 0.56,
    'image_extra_scale' => 1.18,
    'image_radius' => 'rounded-[28px]',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width' => 'max-w-5xl',
    'options_grid_class' => 'mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2',
    'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/cruise.webp'),

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
