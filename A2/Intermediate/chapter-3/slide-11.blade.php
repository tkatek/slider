<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Choose the correct meaning.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/usa.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'it is bad luck',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/british.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'brings money',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/thailand.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'it means you will meet your future husband or wife',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/japan.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'brings good luck',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/spain.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'dangerous. You may see ghosts',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/turkey.webp'),
            'prompt'  => 'Choose the correct meaning.',
            'correct' => 'you will have a good future',
            'options' => [
                'it is bad luck',
                'brings money',
                'it means you will meet your future husband or wife',
                'brings good luck',
                'dangerous. You may see ghosts',
                'you will have a good future',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
