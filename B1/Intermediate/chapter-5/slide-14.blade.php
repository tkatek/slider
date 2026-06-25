<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => 'Sort out the time expressions in the right column',

    'categories' => [
        'Past Simple' => [
            'emoji' => '🕰️',
            'items' => [
                'yesterday',
                'when I was born',
                'a month ago',
                '2 weeks ago',
                'last night',
                'last week',
                'yesterday morning',
                'in 2018',
                'the day before yesterday',
            ],
        ],
        'Present Perfect' => [
            'emoji' => '✅',
            'items' => [
                'recently',
                'for ages',
                'now',
                'for 5 years',
                'already, just, yet',
                'never/ever',
                'so far',
                'since I was born',
                'since 2008',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])