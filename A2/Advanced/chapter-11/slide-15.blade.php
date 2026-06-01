<?php
$content = [
    'title' => 'Practice 6',
    'subtitle' => 'Drag and drop each item into its correct group',

    'categories' => [
        'Long wait' => [
            'emoji' => '⏳',
            'items' => [
                'Sorry, could you tell us how long our order will take?',
                'Sorry, could you check on our order, please?',
            ],
        ],
        'No waiter' => [
            'emoji' => '🙋',
            'items' => [
                'Sorry, could we have a moment?',
                'Excuse me, could you help us, please?',
            ],
        ],
        'Takeaway box' => [
            'emoji' => '🥡',
            'items' => [
                'Can I have a box for the rest of the food?',
                'Could I get this to go, please?',
            ],
        ],
        'More time' => [
            'emoji' => '📖',
            'items' => [
                'Sorry, I’m not ready yet. Give me a bit more time, please.',
                'Could you give us a few more minutes, please?',
            ],
        ],
        'Sauce price' => [
            'emoji' => '💰',
            'items' => [
                'Is the sauce included in the price?',
                'Do I need to pay extra for the sauce?',
            ],
        ],
        'Loud music' => [
            'emoji' => '🔇',
            'items' => [
                'Excuse me, the music is a bit loud. Could you turn it down, please?',
                'Could you turn the music down please?',
            ],
        ],
        'Cold soup' => [
            'emoji' => '🍲',
            'items' => [
                'Sorry, could you heat it, please?',
                'Excuse me, the soup is cold, could you heat it, please?',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])