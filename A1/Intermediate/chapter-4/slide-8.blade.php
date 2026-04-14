<?php
$content = [
    'title' => "What's the matter?",
    'subtitle' => 'Choose the correct answer.',
    'type' => 'image',

    'enable_image_zoom' => false,
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/toothache.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'toothache',
            'options' => ['toothache', 'temperature', 'flu', 'broken_arm', 'headache', 'earache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/sore-throat.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'sore_throat',
            'options' => ['headache', 'sore_throat', 'stomach_ache', 'cough', 'flu', 'temperature'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/cough.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'cough',
            'options' => ['sore_throat', 'temperature', 'stomach_ache', 'flu', 'cut', 'cough'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/broken-arm.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'broken_arm',
            'options' => ['cut', 'broken_arm', 'stomach_ache', 'cough', 'flu', 'temperature'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/earache.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'earache',
            'options' => ['earache', 'flu', 'broken_arm', 'temperature', 'toothache', 'stomach_ache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/cut.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'cut',
            'options' => ['flu', 'sore_throat', 'cut', 'temperature', 'toothache', 'headache'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/slide9/headache.webp'),
            'prompt'  => 'Which health problem is this?',
            'correct' => 'headache',
            'options' => ['flu', 'sore_throat', 'toothache', 'headache', 'broken_arm', 'temperature'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
