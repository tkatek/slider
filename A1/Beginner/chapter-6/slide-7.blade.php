<?php
$content = [
    'page_title' => 'Drag and drop',
    'title' => 'Drag and drop',
    'subtitle' => 'Daily Routine',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories'=>[
        'In the morning' => [
            'emoji' => '🌅',
            'items' => [
                'I get up',
                "I wake up at 7 o'clock",
                'I get dressed',
                'I brush my teeth',
                'I have breakfast at 7:30',
                'I go to college at 8:30',
            ],
        ],
        'In the afternoon' => [
            'emoji' => '☀️',
            'items' => [
                'I have lunch',
                "I go home at 1 o'clock",
                "I pick up my kids at 3 o'clock",
            ],
        ],
        'In the evening' => [
            'emoji' => '🌙',
            'items' => [
                'I eat dinner at 6:00',
                'I watch TV',
                'I go to bed',
            ],
        ],
    ]
];

?>
@include("slider.game.drag-and-drop", ['content' => $content])