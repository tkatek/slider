<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'What does each picture mean?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/1.webp'),

            'prompt'  => 'This sign means...?',
            'correct' => 'buses stop here',
            'options' => ['first aid', 'keep tidy', 'buses stop here'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/2.webp'),

            'prompt'  => 'This sign means...?',
            'correct' => 'you can park here',
            'options' => ['there are toilets here', 'you can park here', 'you can\'t park here'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/3.webp'),

            'prompt'  => 'This sign means...?',
            'correct' => 'way out, escape route',
            'options' => ['switch your phone off', 'don\'t drop litter', 'way out, escape route'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-7/img/slide13/4.webp'),

            'prompt'  => 'This sign means...?',
            'correct' => 'toilets for everyone',
            'options' => ['toilets for everyone', 'toilets for women', 'toilets for men'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])