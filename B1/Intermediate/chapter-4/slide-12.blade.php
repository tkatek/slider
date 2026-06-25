<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => 'Sort out the time expressions in the right group',

    'categories' => [
        'Present simple' => [
            'emoji' => '🔁',
            'items' => [
                'twice a week',
                'on Mondays',
                'usually',
                'seldom',
                'always',
                'often',
                'every',
                'never',
            ],
        ],
        'Past simple' => [
            'emoji' => '🕰️',
            'items' => [
                'two days ago',
                'a long time ago',
                'in 1993',
                'last year',
                'one week ago',
                'last summer',
                'yesterday',
                'the day before yesterday',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])