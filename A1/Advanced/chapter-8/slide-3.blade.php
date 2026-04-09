<?php
$content = [
    'page_title'         => 'Practice 1: Warm-up',
    'title'              => 'Practice 1: Warm-up',
    'subtitle'           => 'Let’s remember some of the safety rules',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'sticky_pool_visible_cap' => 6,

    'categories' => [
        "DO'S" => [
            'emoji' => '✅',
            'items' => [
                'Follow the traffic rules.',
                'Look left, right and again left before crossing the road.',
                'Look for green walk signal before crossing the road.',
                'Use zebra crossing to cross the road.',
                'Walk on the pavement.',
            ],
        ],
        "DON'TS" => [
            'emoji' => '❌',
            'items' => [
                'Play on the road.',
                'Run on the road.',
                'Use mobile phones while crossing the road.',
                'Listen to music when crossing the road.',
                'Cross the road when there are cars moving.',
            ],
        ],
    ],
];
?>

@include("slider.game.drag-and-drop", ['content' => $content])