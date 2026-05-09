<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 1: Warm-up',
    'title'      => 'Practice 1: Warm-up',
    'subtitle'   => '',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide3/1.webp'),
            'prompt'  => 'I’ve _____ to South Africa.',
            'correct' => 'been',
            'options' => ['go', 'been', 'went'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide3/2.webp'),
            'prompt'  => 'She’s never _____ pizza with chocolate.',
            'correct' => 'eaten',
            'options' => ['eaten', 'eat', 'ate'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide3/3.webp'),
            'prompt'  => 'He _____ never made a snowman.',
            'correct' => 'has',
            'options' => ['was', 'have', 'has'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide3/4.webp'),
            'prompt'  => 'Have you ever _____ off your bike?',
            'correct' => 'fallen',
            'options' => ['fallen', 'fell', 'fall'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-6/img/slide3/5.webp'),
            'prompt'  => 'I___ ridden a camel.',
            'correct' => '’ve',
            'options' => ['’s', '’ve', '’m'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])