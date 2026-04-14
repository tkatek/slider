<?php
$content = [

    'title'      => 'Practice 5',
    'subtitle'   => '3️⃣ Places in a town: collocations',

    'cards_grid' => 'grid-cols-2 sm:grid-cols-4 ',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'bus' => [
            'emoji' => '🚌',
            'items' => [
                'stop',
            ],
        ],
        'post' => [
            'emoji' => '📮',
            'items' => [
                'office',
            ],
        ],
        'sports' => [
            'emoji' => '🏟️',
            'items' => [
                'centre',
            ],
        ],
        'train' => [
            'emoji' => '🚆',
            'items' => [
                'station',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])