<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Where might you see these signs?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/1.webp'),

            'prompt'  => 'Where might you see these signs?',
            'correct' => 'in a school or college',
            'options' => ['outdoors', 'at home', 'in a school or college'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/2.webp'),

            'prompt'  => 'Where might you see these signs?',
            'correct' => 'in a library',
            'options' => ['on the bus', 'in the street', 'in a library'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide12/3.webp'),

            'prompt'  => 'Where might you see these signs?',
            'correct' => 'in the street',
            'options' => ['in a school or college', 'at home', 'in the street'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])