<?php

$content = [
    'title' => 'Listening',
    'subtitle' => 'People are talking about their roommates. Listen and choose the two words that best describe each person.',
    'mode' => 'choice_table',

    'audio' => materialAsset('slider/A2/Advanced/chapter-12/audios/slide7.mp3'),

    'row_heading' => 'Person',
    'option_heading' => 'Choose two words',

    'rows' => [
        [
            'number' => '1',
            'item' => 'Tom',
            'options' => [
                'unreliable',
                'inconsiderate',
                'neat',
                'helpful',
            ],
            'correct' => [
                'unreliable',
                'inconsiderate',
            ],
        ],
        [
            'number' => '2',
            'item' => 'Ann',
            'options' => [
                'lazy',
                'quiet',
                'studious',
                'bad-tempered',
            ],
            'correct' => [
                'lazy',
                'bad-tempered',
            ],
        ],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])
