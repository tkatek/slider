<?php
$content = [
    'page_title' => 'Practice 5
',
    'title'      => 'Practice 5',
    'subtitle'   => 'Drag & drop each item into its correct group',

    'cards_grid'         => 'grid-cols-1 sm:grid-cols-3 lg:grid-cols-3',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Explaining the problem' => [
            'emoji' => '📶',
            'items' => [
                'I can’t hear you very well.',
                'It’s my Wi-Fi.',
                'The connection’s terrible.',
                'You’re breaking up.',
                'There’s an echo.',
            ],
        ],

        'Checking the problem' => [
            'emoji' => '🔍',
            'items' => [
                'Is that any better?',
                'Can you hear me now?',
                'How about now?',
                'Are you still there?',
            ],
        ],

        'Solving the problem' => [
            'emoji' => '✅',
            'items' => [
                'We can try again later.',
                'Let me turn up the volume.',
                'Let me call you, OK?',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])