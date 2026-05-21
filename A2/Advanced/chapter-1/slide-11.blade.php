<?php

$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'Sort out these adjectives into these columns:',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Positive' => [
            'emoji' => '😊',
            'items' => [
                'Excellent',
                'Relaxing',
                'Exciting',
                'Interesting',
                'Successful',
                'Rewarding',
                'rewarding',
                'stimulating',
                'creative',
                'challenging',
            ],
        ],
        'Negative' => [
            'emoji' => '😣',
            'items' => [
                'Disappointing',
                'Stressful',
                'dead end job',
                'exhausting',
                'mind numbing',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])