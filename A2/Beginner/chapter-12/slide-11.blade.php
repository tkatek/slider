<?php
$content = [
    'title' => 'Practice 4',
    'subtitle' => '',
    'type' => 'image',

    'page_title' => 'Practice 4',

    'enable_image_zoom' => false,
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/cheese.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'A lot',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/potatoes.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not many',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/cookies.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'A lot',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/oil.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not much',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/butte.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not much',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/tomato.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not many',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/salt.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not much',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/eggs.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'A lot',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/bread.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'Not much',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-12/img/slide11/pineapples.webp'),
            'prompt'  => 'Choose the right answer.',
            'correct' => 'A lot',
            'options' => ['A lot', 'Not many', 'Not much'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])