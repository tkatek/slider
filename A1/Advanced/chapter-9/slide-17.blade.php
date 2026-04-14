<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Quick wrap up',
    'title'      => 'Quick wrap up',
    'subtitle'   => '',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/library.webp'),
            'alt'     => 'Library',
            'prompt'  => 'Where do you go to read books?',
            'correct' => 'Library',
            'options' => [
                'Home',
                'School',
                'Library',
                'Park',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
