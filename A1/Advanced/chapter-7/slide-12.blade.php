<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Where might you see these signs?',

    'enable_image_zoom'      => false,
    'image_plain'            => true,
    'image_scale'            => 0.58,
    'image_extra_scale'      => 1.12,
    'image_radius'           => 'rounded-[28px]',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_panel_inner_class'=> 'h-full p-5 sm:p-6',
    'answer_panel_inner_class' => 'h-full p-5 sm:p-6 text-left',
    'question_prompt_label'  => 'Choose the correct place:',

    'game_card_width' => 'max-w-5xl',
    'tiles_grid_class'   => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3',
    'tile_min_w_desktop' => 220,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Signs and symbols',
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
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/1.webp'),
            'alt'     => 'Picture 1 signs',
            'prompt'  => 'Look at picture 1. Where might you see these signs?',
            'correct' => 'in a school or college',
            'options' => ['outdoors', 'at home', 'in a school or college'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/2.webp'),
            'alt'     => 'Picture 2 signs',
            'prompt'  => 'Look at picture 2. Where might you see these signs?',
            'correct' => 'in a library',
            'options' => ['on the bus', 'in the street', 'in a library'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/3.webp'),
            'alt'     => 'Picture 3 signs',
            'prompt'  => 'Look at picture 3. Where might you see these signs?',
            'correct' => 'in the street',
            'options' => ['in a school or college', 'at home', 'in the street'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])