<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Which of these problems do you have in your neighbourhood?',

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
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/1.webp'),
            'alt'     => 'Traffic in the city center',
            'prompt'  => 'There is ____ traffic in the city center every morning.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/2.webp'),
            'alt'     => 'Cars on the main roads',
            'prompt'  => 'There are _____ cars on the main roads.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/3.webp'),
            'alt'     => 'Green space for children',
            'prompt'  => 'The city does not have _____ green space for children.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/4.webp'),
            'alt'     => 'Clean air in the city',
            'prompt'  => 'We don’t get _____ clean air because of the pollution.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/5.webp'),
            'alt'     => 'Homeless people in the streets',
            'prompt'  => 'The city has _____ homeless people living in the streets.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/6.webp'),
            'alt'     => 'Parking space near the mall',
            'prompt'  => 'There isn’t _____ parking space near the shopping mall.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/7.webp'),
            'alt'     => 'Factories that create pollution',
            'prompt'  => 'There are _____ factories that create pollution.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/8.webp'),
            'alt'     => 'Respect for recycling rules',
            'prompt'  => 'People don’t show ______ respect for recycling rules.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/9.webp'),
            'alt'     => 'Accidents during rush hour',
            'prompt'  => 'We see _____ accidents during rush hour.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/10.webp'),
            'alt'     => 'Money on public transport',
            'prompt'  => 'The city government doesn’t spend _____ money on public transport.',
            'correct' => 'A. much',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/11.webp'),
            'alt'     => 'Noisy bars in the neighborhood',
            'prompt'  => 'The neighborhood has ____ noisy bars that disturb families.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/12.webp'),
            'alt'     => 'Students and affordable housing',
            'prompt'  => 'There are _____ students who cannot find affordable housing.',
            'correct' => 'B. many',
            'options' => [
                'A. much',
                'B. many',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])