<?php
$content = [
    'page_title' => 'Language Focus (Functional Expressions)',
    'title' => 'Language Focus (Functional Expressions)',
    'subtitle' => 'Match the sentences to their function',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Stating your purpose' => [
            'emoji' => '🎯',
            'items' => [
                "I'd like to check out.",
            ],
        ],
        'Asking about a charge' => [
            'emoji' => '💷',
            'items' => [
                "What’s the 14 pounds for?",
            ],
        ],
        'Requesting identification' => [
            'emoji' => '🛂',
            'items' => [
                "May I have your passport?",
            ],
        ],
        'Asking about payment method' => [
            'emoji' => '💳',
            'items' => [
                "Can I pay with traveller’s cheques?",
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])