<?php
$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 7',
    'title'         => 'Practice 7',
    'subtitle'      => 'Choose the correct answer that matches the picture',
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
    'prompt_alt'   => 'Hotel problems',
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
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/dirty-towels.webp'),
            'prompt'  => "What's the matter?",
            'correct' => 'There are old dirty towels.',
            'options' => [
                'There are old dirty towels.',
                'There is some old dirty towels.',
                "There aren't no clean towels.",
                'There are any old dirty towels.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/broken-bed.webp'),
            'prompt'  => "What's the matter?",
            'correct' => "There's a broken bed.",
            'options' => [
                'There are some broken bed.',
                "There's broken bed.",
                "There's a broken bed.",
                'There are any broken bed.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/cockroach.webp'),
            'prompt'  => "What's the matter?",
            'correct' => "There's a cockroach.",
            'options' => [
                "There aren't some cockroaches.",
                "There's a cockroach.",
                "There's some cockroaches.",
                'There are any cockroaches.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/dirty-bedclothes.webp'),
            'prompt'  => "What's the matter?",
            'correct' => 'There are dirty bedclothes.',
            'options' => [
                'There are dirty bedclothes.',
                'There is a dirty bedclothes.',
                "There aren't some clean bedclothes.",
                "There isn't some clean bedclothes.",
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/lift.webp'),
            'prompt'  => "What's the matter?",
            'correct' => "The lift isn't working.",
            'options' => [
                "The lift doesn't work.",
                "The lift isn't working.",
                "The lift don't work.",
                'The lift is working.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/slide14/water.webp'),
            'prompt'  => "What's the matter?",
            'correct' => "There isn't any water.",
            'options' => [
                "There aren't any water.",
                "There isn't some water.",
                "There aren't a water.",
                "There isn't any water.",
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])