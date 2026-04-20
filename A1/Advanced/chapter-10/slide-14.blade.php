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
            'image'   => materialAsset('slider/A1/Advanced/chapter-10/img/slide14/question1.webp'),
            'alt'     => 'Dancing',
            'prompt'  => 'What are the people doing in the picture?',
            'correct' => 'Dancing',
            'options' => [
                'Running',
                'Painting',
                'Playing',
                'Dancing',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-10/img/slide14/question2.webp'),
            'alt'     => 'They are studying',
            'prompt'  => 'What are the correct sentences?',
            'correct' => ['I am watching', 'They are studying'],
            'options' => [
                'I am watching',
                'They studying',
                'She not plays',
                'They are studying',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
