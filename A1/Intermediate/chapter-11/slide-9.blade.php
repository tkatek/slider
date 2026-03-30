<?php
$content = [
    'page_title'    => 'Drag and drop',
    'title'         => 'Drag and drop',
    'subtitle'      => 'Airport Security Checkpoint – Who Says It?',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        'Security Officer' => [
            'emoji' => '👮‍♀️',
            'items' => [
                'Good morning. Boarding pass, please.',
                'Please put your bag on the belt.',
                'Take off your jacket, please.',
                'Remove your laptop from the bag.',
                'Empty your pockets, please.',
                'Do you have any liquids or electronics?',
                'Step forward, please.',
                'Raise your arms.',
                'You can go now.',
                'Thank you. Have a nice flight.',
            ],
        ],
        'Passenger / Traveler' => [
            'emoji' => '🧳',
            'items' => [
                'Good morning. Here’s my boarding pass.',
                'Okay, one moment.',
                'Sure.',
                'No problem.',
                'Do I need to take off my shoes?',
                'Should I remove my laptop?',
                'I don’t have any liquids.',
                'Thank you.',
                'Where do I get my things back?',
            ],
        ],
    ]
];

?>
@include("slider.game.drag-and-drop", ['content' => $content])