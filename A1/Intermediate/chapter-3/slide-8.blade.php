<?php
$content = [
    'page_title'    => 'Practice 3',
    'title'         => 'Practice 3',
    'subtitle'      => "Let's remember formal & informal language",
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        'Formal' => [
            'emoji' => '📝',
            'items' => [
                'Good morning',
                'Good evening',
                'Good night',
                'Hello',
                'Goodbye',
                'See you next time',
                'It was a pleasure seeing you',
                'How are you?',
                'Take care',
                'Excuse me, I have to go',
            ],
        ],
        'Informal' => [
            'emoji' => '💬',
            'items' => [
                'Howdy',
                'Hey',
                'See you',
                "What's up?",
                'Later',
                'Hi',
                "What's new?",
                'How are you doing?',
                'I gotta go',
                'So long',
            ],
        ],
    ],
];
?>
@include("slider.game.drag-and-drop", ['content' => $content])