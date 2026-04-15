<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,


    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/1.webp'),

            'prompt'  => 'There is ..................... noise in the city.',
            'correct' => 'much',
            'options' => [
                'much',
                'many',
                'a lot',
                'a few',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/2.webp'),

            'prompt'  => 'There .............. a few trees near my house.',
            'correct' => 'are',
            'options' => [
                'is',
                'are',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/3.webp'),

            'prompt'  => 'There aren’t ............... shops in this town.',
            'correct' => 'many',
            'options' => [
                'a lot of',
                'much',
                'many',
                'a few',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/4.webp'),

            'prompt'  => 'Are there ............ restaurants nearby?',
            'correct' => 'many',
            'options' => [
                'much',
                'a little',
                'many',
                'a lot',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/3.webp'),

            'prompt'  => 'There is .................... traffic in my area.',
            'correct' => 'a little',
            'options' => [
                'a few',
                'a little',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide13/6.webp'),

            'prompt'  => 'There are ............... of houses around me.',
            'correct' => 'a lot',
            'options' => [
                'a little',
                'many',
                'much',
                'a lot',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])