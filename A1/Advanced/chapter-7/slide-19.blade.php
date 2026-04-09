<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Quiz',
    'title'      => 'Quiz',
    'subtitle'   => 'Test your understanding of signs! What does this sign mean?',

    'enable_image_zoom'        => false,
    'image_plain'              => true,
    'image_scale'              => 0.58,
    'image_extra_scale'        => 1.12,
    'image_radius'             => 'rounded-[28px]',
    'image_panel_col_class'    => 'sm:col-span-6',
    'answer_panel_col_class'   => 'sm:col-span-6',
    'image_panel_inner_class'  => 'h-full p-5 sm:p-6',
    'answer_panel_inner_class' => 'h-full p-5 sm:p-6 text-left',
    'question_prompt_label'    => 'Choose the correct meaning of this sign:',

    'game_card_width'    => 'max-w-5xl',
    'tiles_grid_class'   => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2',
    'tile_min_w_desktop' => 220,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Pedestrian sign',
    'win_title'   => 'Great job!',
    'win_message' => 'You finished the question.',

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
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/sign.webp'),
            'alt'     => 'Pedestrian crossing sign',
            'prompt'  => 'Test your understanding of signs! What does this sign mean?',
            'correct' => 'D. You’re allowed to walk',
            'options' => [
                'A. Walking only',
                'B. No pedestrians',
                'C. Pedestrians must stop',
                'D. You’re allowed to walk',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])