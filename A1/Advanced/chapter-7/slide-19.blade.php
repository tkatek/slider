<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Quiz',
    'title'      => 'Quiz',
    'subtitle'   => 'Test your understanding of signs! What does this sign mean?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/sign.webp'),

            'prompt'  => 'Test your understanding of signs! What does this sign mean?',
            'correct' => 'D. You’re allowed to walk',
            'options' => [
                'A. Walking only',
                'B. No pedestrians',
                'C. Pedestrians must stop',
                'D. You’re allowed to walk',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])