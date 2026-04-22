<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Warm-up: Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'What is this traditional costume called?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sari.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Sari',
            'options' => ['Sari', 'Kilt', 'Kimono', 'Caftan'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kilt.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Kilt',
            'options' => ['Kimono', 'Kilt', 'Sarafan', 'Abaya + Hijab'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kimono.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Kimono',
            'options' => ['Sari', 'Kimono', 'Kilt', 'Sarafan'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/abaya.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Abaya + Hijab',
            'options' => ['Caftan', 'Sari', 'Abaya + Hijab', 'Kimono'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sarafan.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Sarafan',
            'options' => ['Kilt', 'Sarafan', 'Abaya + Hijab', 'Sari'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/morocco.webp'),
            'prompt'  => 'Choose the correct answer:',
            'correct' => 'Caftan',
            'options' => ['Kimono', 'Caftan', 'Sarafan', 'Kilt'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
