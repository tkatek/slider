<?php
$content = [
    'page_title'         => 'Practice 6',
    'title'              => 'Practice 6',
    'subtitle'           => "",
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'What you say' => [
            'emoji' => '🗣️',
            'items' => [
                'I would like to go to Station Hotel, please.',
                'Is there a supplement to pay from the airport?',
                'Could you help me with my luggage, please?',
                'Could you open the windows, please?',
                'Could you turn up the air conditioning, please?',
                'Is the traffic bad at this time of the day?',
                'How much is it, please?',
                'Keep the change.',
                'Will it take long?',
                'Just drop me off here, please.',
            ],
        ],

        'What you hear' => [
            'emoji' => '👂',
            'items' => [
                'Shall I put your bags in the boot?',
                'Where would you like to go?',
                'Shall I drop you off just here?',
                'That is 14 pounds fifty, please.',
                'Would you like a receipt?',
            ],
        ],
    ],
];
?>
@include("slider.game.drag-and-drop", ['content' => $content])