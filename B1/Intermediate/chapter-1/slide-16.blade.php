<?php

$content = [

    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct answer.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/1.webp'),
            'prompt'  => 'They . . . . . . . be Argentinian because they are drinking mate.',
            'correct' => 'must',
            'options' => ['may', 'might', 'must'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/2.webp'),
            'prompt'  => 'It has got 4 legs, so it . . . . . . . be a spider.',
            'correct' => "can't",
            'options' => ["can't", 'may not', 'might not'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/3.webp'),
            'prompt'  => 'Her passport is full of visa stamps, she . . . . . . . travel a lot.',
            'correct' => 'must',
            'options' => ["can't", 'must', 'might'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/4.webp'),
            'prompt'  => 'James always does really well on exams. He . . . . . . . study a lot.',
            'correct' => 'must',
            'options' => ['must', 'might', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/5.webp'),
            'prompt'  => 'Why is that man looking around like that? He . . . . . . . be lost.',
            'correct' => 'may',
            'options' => ["can't", 'may not', 'may'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/6.webp'),
            'prompt'  => 'They are French, so they . . . . . . . speak English.',
            'correct' => 'might not',
            'options' => ['might not', 'may', 'must'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/7.webp'),
            'prompt'  => "It's nearly midnight. He . . . . . . . be at work now, can he?",
            'correct' => "can't",
            'options' => ['may not', 'might', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-1/img/slide16/8.webp'),
            'prompt'  => "Dave has got all of One Direction's CDs; he . . . . . . . like them a lot.",
            'correct' => 'must',
            'options' => ["can't", 'must', 'might'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])