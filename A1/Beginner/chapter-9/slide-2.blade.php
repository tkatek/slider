<?php
$content = [
    'page_title' => 'Drag and drop',
    'title' => 'Drag and drop',
    'subtitle' => '',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        'Fruit' => [
            'emoji' => '🍎',
            'items' => [
                'tangerine',
                'raspberry',
                'kiwi',
                'lemon',
                'orange',
                'apple',
                'cherry',
                'watermelon',
                'pineapple',
            ],
        ],
        'Vegetables' => [
            'emoji' => '🥕',
            'items' => [
                'onion',
                'carrot',
                'pepper',
                'cucumber',
                'leek',
                'tomatoes',
                'potatoes',
            ],
        ],
        'Fish' => [
            'emoji' => '🐟',
            'items' => [
                'sardines',
                'tuna',
                'salmon',
            ],
        ],
        'Cereal' => [
            'emoji' => '🥣',
            'items' => [
                'cereals',
                'rice',
                'flour',
                'bread',
                'roll',
                'pizza',
            ],
        ],
        'Meat' => [
            'emoji' => '🍗',
            'items' => [
                'sausages',
                'ham',
                'chicken',
            ],
        ],
        'Dairy' => [
            'emoji' => '🥛',
            'items' => [
                'yoghurt',
                'milk',
                'cream',
                'cheese',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])