<?php
$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 5',
    'title'         => 'Practice 5',
    'subtitle'      => '',
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



    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/big-house.webp'),
            'prompt'  => 'My house is (big) ______ than yours.',
            'correct' => 'bigger',
            'options' => ['bigger', 'more big', 'biggest', 'big', 'most bigger', 'most biggest'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Floure.webp'),
            'prompt'  => 'This flower is (beautiful) ______ than that one.',
            'correct' => 'more beautiful',
            'options' => ['beautifuler', 'most beautiful', 'more beautiful', 'beautiful', 'more beautifuler', 'most beautifulest'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Book.webp'),
            'prompt'  => 'This is the (interesting) ______ book I have ever read.',
            'correct' => 'most interesting',
            'options' => ['more interesting', 'most interesting', 'interestinger', 'interestingest', 'more interest', 'most interest'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Animal.webp'),
            'prompt'  => 'Which is the (dangerous) ______ animal in the world?',
            'correct' => 'most dangerous',
            'options' => ['most dangerous', 'more dangerous', 'dangerouser', 'dangerousest', 'most dengerouer', 'more dangerousest'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Sea.webp'),
            'prompt'  => 'A holiday by the sea is (good) ______ than a holiday in the mountains.',
            'correct' => 'better',
            'options' => [
                'better',
                'good',
                'most good',
                'more good',
                'more better',
                'gooder'
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Rich.webp'),
            'prompt'  => 'Who is the (rich) ______ woman on earth?',
            'correct' => 'richest',
            'options' => [
                'richest',
                'more rich',
                'most richest',
                'more richer',
                'more richest',
                'richer'
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Weather.webp'),
            'prompt'  => 'The weather this summer is even (bad) ______ than last summer.',
            'correct' => 'worse',
            'options' => [
                'worse',
                'worst',
                'badder',
                'more bad',
                'most bad',
                'more worse'
            ],
        ],

        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/London.webp'),
            'prompt'  => 'London is the (large) ______ city in England.',
            'correct' => 'largest',
            'options' => [
                'largest',
                'more large',
                'larger',
                'most largest',
                'most large',
                'more larger'
            ],
        ],


    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
