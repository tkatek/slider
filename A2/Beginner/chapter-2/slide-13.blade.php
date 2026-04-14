<?php
$content = [

    'title'      => 'Practice 6',
    'subtitle'   => 'Match the season with the activity',

    'cards_grid' => 'grid-cols-2 sm:grid-cols-4',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Spring' => [
            'emoji' => '🌸',
            'items' => [
                'Fly kites',
                'Have picnics',
                'Plant flowers / gardens',
                'Go for walks in the park',
                'Ride a bicycle',
            ],
        ],
        'Summer' => [
            'emoji' => '☀️',
            'items' => [
                'Swim in the pool or at the beach',
                'Eat ice cream',
                'Play outdoor games (football, volleyball)',
                'Go on vacation',
            ],
        ],
        'Autumn (Fall)' => [
            'emoji' => '🍁',
            'items' => [
                'Collect colorful leaves',
                'Carve pumpkins (Halloween)',
                'Drink hot chocolate',
                'Go for long walks',
            ],
        ],
        'Winter' => [
            'emoji' => '❄️',
            'items' => [
                'Build snowmen',
                'Go sledding / ice skating',
                'Celebrate holidays (Christmas, New Year)',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
