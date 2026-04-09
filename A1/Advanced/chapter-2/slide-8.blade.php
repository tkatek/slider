<?php
$content = [
    'title' => 'Practice 4: Listening',
    'type' => 'audio',
    'subtitle' => 'Hotel Facilities',

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
            'prompt' => 'John from London is checking into a hotel in Brazil. He asks about facilities in the hotel. Listen to the receptionist and tick the facilities that she mentions.',
            'correct' => [
                'café',
                'gift shop',
                'restaurant',
                'bar',
                'fitness centre',
                'swimming pool',
            ],
            'options' => [
                'café',
                'bar',
                'restaurant',
                'gift shop',
                'swimming pool',
                'business centre',
                'fitness centre',
                'car parking',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])