<?php

$content = [
    'title'    => 'Practice 5',
    'subtitle' => "Drag and drop each item into it's correct group",

    'categories' => [
        'past' => [
            'emoji' => '🕰️',
            'items' => [
                'I wish I hadn’t shouted at my mum.',
                'I wish I had told her how I was feeling.',
                'I wish I hadn’t lied to him.',
            ],
        ],
        'present' => [
            'emoji' => '💭',
            'items' => [
                'I wish I wasn’t so bad at football.',
                'I wish I had more time to do things.',
                'I wish my parents understood me better.',
            ],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop', ['content' => $content])