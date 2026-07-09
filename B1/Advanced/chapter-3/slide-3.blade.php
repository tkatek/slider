<?php

$content = [
    'type'       => 'image',
    'title'      => 'Warm up: Practice 1',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/job.webp'),
            'prompt'  => "He . . . . . . get the job, but I'm not sure.",
            'correct' => 'might',
            'options' => ['might', 'must', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/rich-house.webp'),
            'prompt'  => 'They . . . . . . be very rich — look at their big house!',
            'correct' => 'must',
            'options' => ['might', 'must', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/study.webp'),
            'prompt'  => "I didn't study yesterday — I . . . . . . pass the exam.",
            'correct' => 'might not',
            'options' => ['might not', 'must not', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/london.webp'),
            'prompt'  => "You can't . . . . . . her yesterday — she is in London. (see)",
            'correct' => 'have seen',
            'options' => ['see', 'saw', 'have seen', 'has seen'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/mistake.webp'),
            'prompt'  => "I'm not sure if Mark is right — he might . . . . . . a mistake. (make)",
            'correct' => 'have made',
            'options' => ['make', 'made', 'have made', 'has made'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-3/img/slide3/exam-failed.webp'),
            'prompt'  => 'You failed the exam, so your answers must . . . . . . wrong! (be)',
            'correct' => 'have been',
            'options' => ['be', 'were', 'are', 'have been'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])