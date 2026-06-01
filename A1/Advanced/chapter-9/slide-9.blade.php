<?php
$content = [

    'title'      => 'Practice 5',
    'subtitle'   => '3️⃣ Places in a town: collocations',

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