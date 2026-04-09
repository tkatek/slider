<?php
$content = [
    'title' => 'Practice 5',
    'type' => 'audio',
    'subtitle' => 'Listen again and tick True or False for each statement',

    'audio' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide8.mp3'),

    'status_row_width' => 'max-w-5xl',
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'You can have breakfast from 7 to 10 every morning in the café over there, next to the gift shop.',
        'There is an Italian restaurant on the third floor, and the bar is open until 2 am.',
        'We have a fitness centre on the top floor, and there’s a swimming pool up there too.',
    ],

    'questions' => [
        [
            'prompt' => 'Breakfast is from 7.30 to ten every morning.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt' => 'The café is next to the gift shop.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt' => 'There is an Italian restaurant on the fourth floor.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt' => 'The bar closes at 2am.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt' => 'The fitness centre is on the ground floor.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])