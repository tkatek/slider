<?php
$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 1',
    'title'         => 'Can you guess the game?',
    'subtitle'      => 'Practice 1',
    'enable_image_zoom' => false,
    'image_plain'       => true,
    'image_scale'       => 0.56,
    'image_extra_scale' => 1.18,
    'image_radius'      => 'rounded-[28px]',
    'image_panel_col_class'   => 'sm:col-span-6',
    'answer_panel_col_class'  => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width'         => 'max-w-5xl',

    'tiles_grid_class'   => 'grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1',
    'tile_min_w_desktop' => 400,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'    => 2,
    'game_type'    => 'quiz',
    'prompt_alt'   => 'Sports',
    'win_title'    => 'Great job!',
    'win_message'  => 'You finished all questions.',

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
            'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-4/baseball.webp'),
            'prompt'  => 'What game is this?',
            'correct' => 'baseball',
            'options' => ['volleyball', 'football', 'hockey', 'baseball'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-4/football.webp'),
            'prompt'  => 'What game is this?',
            'correct' => 'football',
            'options' => ['boxing', 'football', 'weight lifting', 'parachuting'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-4/jogging.webp'),
            'prompt'  => 'What activity is this?',
            'correct' => 'jogging',
            'options' => ['snowboarding', 'jogging', 'bungee jumping', 'running'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-4/rollerblading.webp'),
            'prompt'  => 'What activity is this?',
            'correct' => 'rollerblading',
            'options' => ['ice skating', 'rollerblading', 'surfing', 'windsurfing'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-4/surfing.webp'),
            'prompt'  => 'What sport is this?',
            'correct' => 'surfing',
            'options' => ['surfing', 'windsurfing', 'ice skating', 'rollerblading'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
