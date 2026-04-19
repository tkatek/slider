<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Look at the pictures and choose the correct answer',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-4/img/slide7/museum.webp'),
            'prompt'  => 'What did you do yesterday?',
            'correct' => 'I went to the museum.',
            'options' => [
                'I went to the zoo.',
                'I went to the museum.',
                'I went to the park.',
                'I went to school.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-4/img/slide7/park.webp'),
            'prompt'  => 'What did you do yesterday?',
            'correct' => 'I went to the park.',
            'options' => [
                'I went to the zoo.',
                'I went to the museum.',
                'I went to the park.',
                'I went to school.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-4/img/slide7/school.webp'),
            'prompt'  => 'What did you do yesterday?',
            'correct' => 'I went to school.',
            'options' => [
                'I went to the zoo.',
                'I went to the museum.',
                'I went to the park.',
                'I went to school.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-4/img/slide7/cinema.webp'),
            'prompt'  => 'What did you do yesterday?',
            'correct' => 'I went to the cinema.',
            'options' => [
                'I went to the cinema.',
                'I went to the museum.',
                'I went to the park.',
                'I went to school.',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-4/img/slide7/zoo.webp'),
            'prompt'  => 'What did you do yesterday?',
            'correct' => 'I went to the zoo.',
            'options' => [
                'I went to the zoo.',
                'I went to the museum.',
                'I went to the park.',
                'I went to school.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])