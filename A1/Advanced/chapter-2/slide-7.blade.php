<?php
$content = [
    'page_title'    => 'Practice 3',
    'title'         => 'Practice 3',
    'subtitle'      => 'Which numbers in a hotel do you call for the following services? Write the numbers next
to the services',
    'image'         => materialAsset('slider/A1/Advanced/chapter-2/img/slide7.webp'),
    'type'          => 'image',
    'enable_image_zoom' => false,
    'image_scale'   => 0.78,

    'image_fit_class' => 'object-cover',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',

    'questions' => [
        [
            'prompt'  => 'To order a meal in your room, dial …… .',
            'correct' => '15',
            'options' => [
                '15',
                '10',
                '7',
            ],
        ],
        [
            'prompt'  => 'To get clothes dry cleaned, dial …… .',
            'correct' => '9',
            'options' => [
                '9',
                '6',
                '5',
            ],
        ],
        [
            'prompt'  => 'To get help carrying your bags, dial …… .',
            'correct' => '6',
            'options' => [
                '6',
                '7',
                '10',
            ],
        ],
        [
            'prompt'  => 'To get your room cleaned, dial …… .',
            'correct' => '10',
            'options' => [
                '10',
                '15',
                '9',
            ],
        ],
        [
            'prompt'  => 'To get theater tickets, dial …… .',
            'correct' => '7',
            'options' => [
                '7',
                '5',
                '6',
            ],
        ],
        [
            'prompt'  => 'To check if you have received mail, dial …… .',
            'correct' => '5',
            'options' => [
                '5',
                '9',
                '15',
            ],
        ],
    ],
];
?>

@include("slider.game.multi-choice-all-in-one", ['content' => $content])
