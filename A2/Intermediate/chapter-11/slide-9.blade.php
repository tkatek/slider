<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => '',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/happy.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Happy',
            'options' => ['Happy', 'Sad', 'Angry', 'Surprised'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/sad.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Sad',
            'options' => ['Happy', 'Sad', 'Angry', 'Confused'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/angry.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Angry',
            'options' => ['Scared', 'Happy', 'Angry', 'Sad'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/surprised.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Surprised',
            'options' => ['Surprised', 'Angry', 'Sad', 'Happy'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/confused.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Confused',
            'options' => ['Happy', 'Confused', 'Angry', 'Sad'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/scared.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Scared',
            'options' => ['Scared', 'Happy', 'Angry', 'Surprised'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/worried.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Worried',
            'options' => ['Happy', 'Worried', 'Sad', 'Angry'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/excited.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Excited',
            'options' => ['Sad', 'Angry', 'Excited', 'Confused'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/tired.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Tired',
            'options' => ['Tired', 'Happy', 'Surprised', 'Scared'],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/calm.webp'),
            'prompt'  => 'Match the picture with the right feeling.',
            'correct' => 'Calm',
            'options' => ['Angry', 'Calm', 'Sad', 'Confused'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])