<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Write these words under the correct headings.',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Age' => [
            'emoji' => '🎂',
            'items' => [
                'about 22',
                'in her teens',
                'almost 25',
                '19 years old',
                'in his twenties',
                'in her thirties',
            ],
        ],
        'Height' => [
            'emoji' => '📏',
            'items' => [
                'about 170 cm',
                'tall',
                'short',
                'not very tall',
            ],
        ],
        'Hair' => [
            'emoji' => '💇',
            'items' => [
                'dark',
                'long',
                'blond',
                'curly',
                'straight',
                'light brown',
                'shoulder-length',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])