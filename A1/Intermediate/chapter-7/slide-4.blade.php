<?php

$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 2',
    'title'         => 'Can you guess what type of holiday this is?',
    'subtitle'      => 'Choose the correct holiday type.',
    'header_wrap_class' => 'header-spacing w-full text-center space-y-3 mt-1 mb-2 sm:mt-2 sm:mb-3',
    'title_class' => 'w-full whitespace-normal lg:whitespace-nowrap tracking-tight text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black mb-3',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100',
    'question_prompt_label' => 'Pick the correct holiday type:',
    'enable_image_zoom' => false,
    'image_plain'       => true,
    'image_scale'       => 0.56,
    'image_extra_scale' => 1.18,
    'image_radius'      => 'rounded-[28px]',
    'image_panel_col_class'   => 'sm:col-span-6',
    'answer_panel_col_class'  => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width' => 'max-w-5xl',

    'tiles_grid_class'   => 'grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2',
    'tile_min_w_desktop' => 400,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',
    'tiny_cols'          => 2,

    'game_type'   => 'quiz',
    'prompt_alt'  => 'Holiday type',
    'win_title'   => 'Great job!',
    'win_message' => 'You finished all questions.',

    'sfx' => [
        'enabled' => true,
        'sources' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
            'success' => materialAsset('slider/sounds/success.wav'),
        ],
        'volume' => [
            'correct' => 1,
            'wrong'   => 1,
            'success' => 1,
        ],
    ],
    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/cruise.webp'),
            'answer'  => 'cruise',
            'options' => ['cruise', 'beach holiday', 'camping holiday'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/beach.webp'),
            'answer'  => 'beach holiday',
            'options' => ['safari', 'cruise', 'beach holiday'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/camping.webp'),
            'answer'  => 'camping holiday',
            'options' => ['camping holiday', 'hiking holiday', 'city break'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/mountains.webp'),
            'answer'  => 'hiking holiday',
            'options' => ['camping holiday', 'hiking holiday', 'culture holiday'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/historical-places.webp'),
            'answer'  => 'culture holiday',
            'options' => ['culture holiday', 'hiking holiday', 'city break'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/safari.webp'),
            'answer'  => 'safari',
            'options' => ['safari', 'cruise', 'city break'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
