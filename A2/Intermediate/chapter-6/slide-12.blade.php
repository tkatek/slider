<?php
$content = [
    'title' => 'Practice 4',
    'subtitle' => 'Read & choose the correct answer:',
    'type' => 'image',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/1.webp'),
            'prompt'  => 'I was _____ TV when the lights ________ out.',
            'correct' => 'watching / went',
            'options' => [
                'watched / went',
                'watched / were going',
                'watching / went',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/2.webp'),
            'prompt'  => 'He ______________ tennis when he ____ her arm.',
            'correct' => 'was playing / broke',
            'options' => [
                'played / was breaking',
                'was playing / broke',
                'was playing / was breaking',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/3.webp'),
            'prompt'  => 'I was doing my homework ______ my friend sent me a whatsapp message.',
            'correct' => 'when',
            'options' => [
                'when',
                'while',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/4.webp'),
            'prompt'  => "I wasn't paying attention ______ the teacher was speaking.",
            'correct' => 'while',
            'options' => [
                'when',
                'while',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/5.webp'),
            'prompt'  => 'I was walking my dog when I _______ you.',
            'correct' => 'saw',
            'options' => [
                'saw',
                'was seeing',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/6.webp'),
            'prompt'  => 'They were sleeping ________ the phone rang.',
            'correct' => 'when',
            'options' => [
                'when',
                'while',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/7.webp'),
            'prompt'  => 'I ___ watching a horror movie when my brother _________ me.',
            'correct' => 'was / scared',
            'options' => [
                'were / scared',
                'was / scared',
                'was / was scaring',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/8.webp'),
            'prompt'  => 'I _____________ while my mother _________________ the dinner.',
            'correct' => 'was studying / was cooking',
            'options' => [
                'was studying / was cooking',
                'was studying / cooked',
                'studied / was cooking',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/9.webp'),
            'prompt'  => 'He was playing football ___________ his father was washing the car.',
            'correct' => 'while',
            'options' => [
                'when',
                'while',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-6/img/slide12/10.webp'),
            'prompt'  => '__________ he crashed the car, he was using the cell phone.',
            'correct' => 'when',
            'options' => [
                'when',
                'while',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
