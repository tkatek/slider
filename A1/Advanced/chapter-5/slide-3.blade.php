<?php
$content = [
    'type'               => 'image',
    'page_title'         => 'Practice 1',
    'title'              => 'Practice 1',
    'subtitle'           => 'Warm-up',
    'enable_image_zoom'  => false,
    'image_plain'        => true,
    'image_scale'        => 0.56,
    'image_extra_scale'  => 1.18,
    'image_radius'       => 'rounded-[28px]',
    'image_panel_col_class'   => 'sm:col-span-6',
    'answer_panel_col_class'  => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width'         => 'max-w-5xl',

    'tiles_grid_class'   => 'grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1',
    'tile_min_w_desktop' => 400,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Simple Present Transportation',
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
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/1.webp'),
            'prompt'  => 'He ________ a bike on the street.',
            'correct' => 'rides',
            'options' => ['ride', 'rides'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/2.webp'),
            'prompt'  => 'They ________ the train to work.',
            'correct' => 'take',
            'options' => ['take', 'takes'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/3.webp'),
            'prompt'  => 'I ________ to the library every morning.',
            'correct' => 'go',
            'options' => ['go', 'goes'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/4.webp'),
            'prompt'  => 'My brother Taylor ________ to the mall every weekend.',
            'correct' => 'drives',
            'options' => ['drive', 'drives'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/5.webp'),
            'prompt'  => 'She ________ a motorcycle.',
            'correct' => 'rides',
            'options' => ['ride', 'rides'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-5/img/chapter3/6.webp'),
            'prompt'  => 'Tourists usually ________ taxis in New York.',
            'correct' => 'take',
            'options' => ['take', 'takes'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])