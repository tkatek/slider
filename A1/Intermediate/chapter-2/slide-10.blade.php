<?php
$content = [
    'page_title' => 'Drag and drop',
    'title' => 'Drag and drop',
    'subtitle' => 'Special Days',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'items_per_line' => 3,
    'items_per_line_mobile' => 2,
    'category_content_grid_class' => 'grid-cols-1',
    'mobile_compact' => true,
    'categories' => [
        "New Year's Eve" => [
            'emoji' => '🎆',
            'items' => [
                'go to see fireworks',
                'shout "Happy New Year"',
            ],
        ],
        "Valentine's Day" => [
            'emoji' => '💝',
            'items' => [
                'give someone chocolates',
                'go out for a romantic dinner',
            ],
        ],
        'Birthday' => [
            'emoji' => '🎂',
            'items' => [
                'blow out candles on a cake',
                'sing "Happy Birthday"',
            ],
        ],
        'Graduation Day' => [
            'emoji' => '🎓',
            'items' => [
                'get a degree or diploma',
                'wear a cap and gown',
            ],
        ],
        'Halloween' => [
            'emoji' => '🎃',
            'items' => [
                'go trick-or-treating',
                'wear a costume',
            ],
        ],
        'Wedding Day' => [
            'emoji' => '💍',
            'items' => [
                'exchange rings',
                'have a reception',
            ],
        ],
    ]
];

?>
@include("slider.game.drag-and-drop", ['content' => $content])
