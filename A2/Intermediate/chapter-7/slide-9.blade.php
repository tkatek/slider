<?php
$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Correct the mistakes.',
    'grid_class' => 'grid-cols-1 lg:grid-cols-2',

    'items' => [
        [
            'number' => 1,
            'parts'  => [
                ['text' => 'She '],
                ['answer' => 'is', 'placeholder' => "will"],
                ['text' => 'going to study medicine next year.'],
            ],
        ],
        [
            'number' => 2,
            'parts'  => [
                ['text' => 'We are '],
                ['answer' => 'going', 'placeholder' => "go"],
                ['text' => ' to travel to Italy next summer.'],
            ],
        ],
        [
            'number' => 3,
            'parts'  => [
                ['text' => 'I am '],
                ['answer' => 'going', 'placeholder' => "go"],
                ['text' => ' to meet my friend tonight.'],
            ],
        ],
        [
            'number' => 4,
            'parts'  => [
                ['text' => 'The train '],
                ['answer' => 'leaves', 'placeholder' => "will leaves"],
                ['text' => ' at 6 p.m.'],
            ],
        ],
        [
            'number' => 5,
            'parts'  => [
                ['text' => 'I think it '],
                ['answer' => 'will rain', 'placeholder' => "going"],
                ['text' => ' later.'],
            ],
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
