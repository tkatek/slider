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
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/ride-bike.webp'),
            'prompt'  => 'She . . . . . . . a bike.',
            'correct' => 'has not ridden',
            'options' => ['has not ridden', 'has not ride', 'have not ride'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/buy-food.webp'),
            'prompt'  => 'She . . . . . . . food.',
            'correct' => 'has not bought',
            'options' => ['has not buy', 'have not bought', 'has not bought'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/finish-homework.webp'),
            'prompt'  => 'He . . . . . . . homework.',
            'correct' => 'has not finished',
            'options' => ['has not finish', 'has not finished', 'have not finished'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/fix-car.webp'),
            'prompt'  => 'I . . . . . . . the car.',
            'correct' => 'have not fixed',
            'options' => ['have not fix', 'have not fixed', 'has not fixed'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/find-key.webp'),
            'prompt'  => 'We . . . . . . . the key.',
            'correct' => 'have not found',
            'options' => ['have not find', 'have not found', 'has not found'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/cook-eggs.webp'),
            'prompt'  => 'They . . . . . . . the eggs.',
            'correct' => 'have not cooked',
            'options' => ['have not cook', 'has not cooked', 'have not cooked'],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-5/img/slide11/climb-mountain.webp'),
            'prompt'  => 'He . . . . . . . the mountain.',
            'correct' => 'has not climbed',
            'options' => ['has not climbed', 'have not climbed', 'has not climb'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
