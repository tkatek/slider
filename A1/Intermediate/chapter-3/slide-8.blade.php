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
                'Hello',
                'How are you?',
                'Thank you',
                'Do you understand me?',
                'Unfortunately, I will not be able to attend.',
                'Goodbye',
                'My sister is a pain in the neck.',
                'We will have to cancel.',
                "I don't understand.",
                'I am writing to inform you ..',
            ],
        ],
        'Informal' => [
            'emoji' => '💬',
            'items' => [
                'Hey',
                'What you saying?',
                'Cheers mate',
                'You know what I mean?',
                "Sorry, I cant make it.",
                'See ya later',
                'My sister annoys me.',
                'We need to call it off.',
                "I don't get it",
                "I'm just letting you know..",
            ],
        ],
    ],
];
?>
@include("slider.game.drag-and-drop", ['content' => $content])
