<?php
$content = [
    'page_title'         => 'Practice 1: Warm-up',
    'title'              => 'Practice 1: Warm-up',
    'subtitle'           => "Who says what?!",
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'sticky_pool_visible_cap' => 6,

    'categories' => [
        'Passenger' => [
            'emoji' => '🧍',
            'items' => [
                'Good morning. I work at NAIT. Is this the right bus for NAIT?',
                'Oh, sorry. Which bus will get me to NAIT?',
                'Okay, thank you. How often does the #3 bus come?',
                'Okay, thanks. How long will it take me to get to NAIT?',
                'Twenty minutes? That’s fast! What’s the fare?',
                'Can you please tell me when we get to Westmount Shopping Centre?',
                'Thank you for your help!',
            ],
        ],
        'Bus Driver' => [
            'emoji' => '🚌',
            'items' => [
                'No. This is an express bus to Westmount Shopping Centre.',
                'You can take this bus and then transfer to the #3 bus at Westmount Shopping Centre.',
                'The #3 bus comes every 10 minutes.',
                'It will take about 20 minutes.',
                "Three dollars and fifty cents for adults. Here's a transfer for the #3 bus.",
                'Sure. I will tell you when we get to the correct stop.',
            ],
        ],
    ],
];
?>

@include("slider.game.drag-and-drop", ['content' => $content])
