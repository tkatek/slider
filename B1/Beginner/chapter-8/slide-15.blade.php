<?php
$content = [
    'title' => 'Practice 6',
    'subtitle' => '',
    'activity_title' => 'Join the sentence halves:',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'a',
            'left' => [
                'type' => 'word',
                'text' => 'a) If I was the president,',
            ],
            'right' => [
                'type' => 'word',
                'text' => '5) I would spend more money on schools.',
            ],
        ],
        [
            'id' => 'b',
            'left' => [
                'type' => 'word',
                'text' => 'b) If my friends and I met David Beckham,',
            ],
            'right' => [
                'type' => 'word',
                'text' => "4) we’d play football with him.",
            ],
        ],
        [
            'id' => 'c',
            'left' => [
                'type' => 'word',
                'text' => 'c) If a lion escaped from the zoo,',
            ],
            'right' => [
                'type' => 'word',
                'text' => '2) everybody would run away',
            ],
        ],
        [
            'id' => 'd',
            'left' => [
                'type' => 'word',
                'text' => 'd) If I went out every night,',
            ],
            'right' => [
                'type' => 'word',
                'text' => "1) I wouldn’t have much money at the end of the month.",
            ],
        ],
        [
            'id' => 'e',
            'left' => [
                'type' => 'word',
                'text' => 'e) If my brother was taller,',
            ],
            'right' => [
                'type' => 'word',
                'text' => '3) he would become a professional basketball.',
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