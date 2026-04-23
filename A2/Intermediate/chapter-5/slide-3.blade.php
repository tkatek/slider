<?php
$content = [
    'page_title' => 'Warmp-up: Practice 1',
    'title' => 'Warmp-up: Practice 1',
    'subtitle' => 'How was your day?',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'A good day' => [
            'emoji' => '',
            'items' => [
                'It was a beautiful day',
                'It was a fantastic day',
                'It was a successful day',
                'It was a wonderful day',
                'It was a lovely day',
                'It was a perfect day',
                'It was a great day',
                'It was a productive day',
            ],
        ],
        'A bad day' => [
            'emoji' => '',
            'items' => [
                'It was a stressful day',
                'It was a terrible day',
                'It was a depressing day',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
