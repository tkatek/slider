<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom'        => false,
    'image_plain'              => true,
    'image_scale'              => 0.58,
    'image_extra_scale'        => 1.12,
    'image_radius'             => 'rounded-[28px]',
    'image_panel_col_class'    => 'sm:col-span-6',
    'answer_panel_col_class'   => 'sm:col-span-6',
    'image_panel_inner_class'  => 'h-full p-5 sm:p-6',
    'answer_panel_inner_class' => 'h-full p-5 sm:p-6 text-left',
    'question_prompt_label'    => 'Choose the correct answer:',

    'game_card_width'    => 'max-w-5xl',
    'tiles_grid_class'   => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2',
    'tile_min_w_desktop' => 220,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Quiz image',
    'win_title'   => 'Great job!',
    'win_message' => 'You finished the quiz.',

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
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/1.webp'),
            'alt'     => 'Noise in the city',
            'prompt'  => 'There is ..................... noise in the city.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
                'C. a lot',
                'D. a few',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/2.webp'),
            'alt'     => 'Trees near my house',
            'prompt'  => 'There .............. a few trees near my house.',
            'correct' => 'B. are',
            'options' => [
                'A. is',
                'B. are',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/3.webp'),
            'alt'     => 'Shops in this town',
            'prompt'  => 'There aren’t ............... shops in this town.',
            'correct' => 'C. many',
            'options' => [
                'A. a lot of',
                'B. much',
                'C. many',
                'D. a few',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/4.webp'),
            'alt'     => 'Restaurants nearby',
            'prompt'  => 'Are there ............ restaurants nearby?',
            'correct' => 'C. many',
            'options' => [
                'A. much',
                'B. a little',
                'C. many',
                'D. a lot',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/5.webp'),
            'alt'     => 'Traffic in my area',
            'prompt'  => 'There is .................... traffic in my area.',
            'correct' => 'B. a little',
            'options' => [
                'A. a few',
                'B. a little',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/6.webp'),
            'alt'     => 'Houses around me',
            'prompt'  => 'There are ............... of houses around me.',
            'correct' => 'D. a lot',
            'options' => [
                'A. a little',
                'B. many',
                'C. much',
                'D. a lot',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])