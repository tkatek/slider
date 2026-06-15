<?php
$content = [
    'title' => 'Seaside Entertainment',
    'subtitle' => 'Put the words into the correct groups.',

    'categories' => [
        'Traditional entertainment' => [
            'emoji' => '🎪',
            'items' => [
                'sandcastle building',
                'donkey rides',
                'walking on the pier',
                'watching a puppet show',
                'going to the beach',
            ],
        ],
        'Virtual entertainment' => [
            'emoji' => '🕹️',
            'items' => [
                'dance mat',
                'driving games',
            ],
        ],
        'Traditional food' => [
            'emoji' => '🍦',
            'items' => [
                'fish and chips',
                'ice cream',
                'a stick of rock',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])