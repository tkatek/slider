<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'What does each picture mean?',

    'enable_image_zoom'        => false,
    'image_plain'              => true,
    'image_scale'              => 0.58,
    'image_extra_scale'        => 1.12,
    'image_radius'             => 'rounded-[28px]',
    'image_panel_col_class'    => 'sm:col-span-6',
    'answer_panel_col_class'   => 'sm:col-span-6',
    'image_panel_inner_class'  => 'h-full p-5 sm:p-6',
    'answer_panel_inner_class' => 'h-full p-5 sm:p-6 text-left',
    'question_prompt_label'    => 'Choose the correct meaning:',

    'game_card_width'    => 'max-w-5xl',
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
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/1.webp'),
            'alt'     => 'Picture 1 bus stop sign',
            'prompt'  => 'Look at Picture 1. This sign means...?',
            'correct' => 'buses stop here',
            'options' => ['first aid', 'keep tidy', 'buses stop here'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/2.webp'),
            'alt'     => 'Picture 2 parking sign',
            'prompt'  => 'Look at Picture 2. This sign means...?',
            'correct' => 'you can park here',
            'options' => ['there are toilets here', 'you can park here', 'you can\'t park here'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/3.webp'),
            'alt'     => 'Picture 3 exit sign',
            'prompt'  => 'Look at Picture 3. This sign means...?',
            'correct' => 'way out, escape route',
            'options' => ['switch your phone off', 'don\'t drop litter', 'way out, escape route'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/4.webp'),
            'alt'     => 'Picture 4 gender neutral toilet sign',
            'prompt'  => 'Picture 4. This sign means...?',
            'correct' => 'toilets for everyone',
            'options' => ['toilets for everyone', 'toilets for women', 'toilets for men'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])