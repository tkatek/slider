<?php
$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 1',
    'title'         => 'What\'s the matter?',
    'subtitle'      => 'Practice 1',
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

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Health problem',
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

    'optionsBank' => [
        ['key' => 'flu',          'word' => 'flu'],
        ['key' => 'sore_throat',  'word' => 'sore throat'],
        ['key' => 'cold',         'word' => 'cold'],
        ['key' => 'temperature',  'word' => 'temperature'],
        ['key' => 'toothache',    'word' => 'toothache'],
        ['key' => 'headache',     'word' => 'headache'],
        ['key' => 'stomach_ache', 'word' => 'stomach ache'],
        ['key' => 'cough',        'word' => 'cough'],
        ['key' => 'cut',          'word' => 'cut'],
        ['key' => 'broken_arm',   'word' => 'broken arm'],
        ['key' => 'earache',      'word' => 'earache'],
    ],

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/toothache.webp'),
            'answer'  => 'toothache',
            'options' => ['toothache', 'temperature', 'flu', 'broken_arm', 'headache', 'earache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/sore-throat.webp'),
            'answer'  => 'sore_throat',
            'options' => ['headache', 'sore_throat', 'stomach_ache', 'cough', 'flu', 'temperature'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/cough.webp'),
            'answer'  => 'cough',
            'options' => ['sore_throat', 'temperature', 'stomach_ache', 'flu', 'cut', 'cough'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/broken-arm.webp'),
            'answer'  => 'broken_arm',
            'options' => ['cut', 'broken_arm', 'stomach_ache', 'cough', 'flu', 'temperature'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/earache.webp'),
            'answer'  => 'earache',
            'options' => ['earache', 'flu', 'broken_arm', 'temperature', 'toothache', 'stomach_ache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/cut.webp'),
            'answer'  => 'cut',
            'options' => ['flu', 'sore_throat', 'cut', 'temperature', 'toothache', 'headache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/headache.webp'),
            'answer'  => 'headache',
            'options' => ['flu', 'sore_throat', 'toothache', 'headache', 'broken_arm', 'temperature'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
