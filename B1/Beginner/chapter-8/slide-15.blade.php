<?php
$content = [

    'title' => 'Practice 6',
    'subtitle' => '',
    'activity_title' => 'Join the sentences halves:',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'a',
            'left' => [
                'type' => 'word',
                'text' => 'If I was the president,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I would spend more money on schools.',
            ],
        ],
        [
            'id' => 'b',
            'left' => [
                'type' => 'word',
                'text' => 'If my friends and I met David Beckham,',
            ],
            'right' => [
                'type' => 'word',
                'text' => "we’d play football with him.",
            ],
        ],
        [
            'id' => 'c',
            'left' => [
                'type' => 'word',
                'text' => 'If a lion escaped from the zoo,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'everybody would run away',
            ],
        ],
        [
            'id' => 'd',
            'left' => [
                'type' => 'word',
                'text' => 'If I went out every night,',
            ],
            'right' => [
                'type' => 'word',
                'text' => "I wouldn’t have much money at the end of the month.",
            ],
        ],
        [
            'id' => 'e',
            'left' => [
                'type' => 'word',
                'text' => 'If my brother was taller,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'he would become a professional basketball.',
            ],
        ],
    ],

    'right_order' => [
        'd',
        'c',
        'e',
        'b',
        'a',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])