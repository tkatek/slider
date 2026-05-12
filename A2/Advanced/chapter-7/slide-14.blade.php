<?php
$content = [
    'page_title' => 'Drag and drop',
    'title' => 'Practice 6 ',
    'subtitle' => 'Are your goals measurable or not?!<br>Read the sentences & choose smart or not smart',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Smart goal' => [
            'emoji' => '✅',
            'items' => [
                'I will exercise for 20 minutes every day this month.',
                'I will save 10$ a day for a month to buy a new headphones.',
            ],
        ],
        'Not a smart goal' => [
            'emoji' => '❌',
            'items' => [
                'I will lose 20 kg by the end of this month.',
                'I will save some money to buy new headphone someday!',
                'I will get in shape if I have time.',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])