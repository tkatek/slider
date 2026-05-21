<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Which of these problems do you have in your neighbourhood?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.58,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/1.webp'),
            'prompt'  => 'There is . . . . . . . traffic in the city center every morning.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/2.webp'),
            'prompt'  => 'There are . . . . . . . cars on the main roads.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/3.webp'),
            'prompt'  => 'The city does not have . . . . . . . green space for children.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/4.webp'),
            'prompt'  => 'We don’t get . . . . . . . clean air because of the pollution.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/5.webp'),
            'prompt'  => 'The city has . . . . . . . homeless people living in the streets.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/6.webp'),
            'prompt'  => 'There isn’t . . . . . . . parking space near the shopping mall.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/7.webp'),
            'prompt'  => 'There are . . . . . . . factories that create pollution.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/8.webp'),
            'prompt'  => 'People don’t show . . . . . . . respect for recycling rules.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/9.webp'),
            'prompt'  => 'We see . . . . . . . accidents during rush hour.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/10.webp'),
            'prompt'  => 'The city government doesn’t spend . . . . . . . money on public transport.',
            'correct' => 'much',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/11.webp'),
            'prompt'  => 'The neighborhood has . . . . . . . noisy bars that disturb families.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/12.webp'),
            'prompt'  => 'There are . . . . . . . students who cannot find affordable housing.',
            'correct' => 'many',
            'options' => ['much', 'many'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])