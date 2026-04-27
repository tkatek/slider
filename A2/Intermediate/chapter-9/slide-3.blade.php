<?php
$content = [
    'page_title' => 'Practice 1: Warm-up',
    'title'      => 'Drag and drop',
    'subtitle'   => 'Match the first conditional sentences with the correct endings.',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'If I sleep late,' => [
            'emoji' => '😴',
            'items' => [
                'I will be sleepy the next day.',
            ],
        ],

        'If George wins the competition,' => [
            'emoji' => '🏆',
            'items' => [
                'he will be very happy.',
            ],
        ],

        'If Tina and Frank don’t eat their food,' => [
            'emoji' => '🍽️',
            'items' => [
                'their parents will be angry.',
            ],
        ],

        'If the weather is good,' => [
            'emoji' => '☀️',
            'items' => [
                'I will go to the park.',
            ],
        ],

        'If the movie is bad,' => [
            'emoji' => '🎬',
            'items' => [
                'I won’t be happy to see it.',
            ],
        ],

        'My friends won’t go to the trip' => [
            'emoji' => '🚌',
            'items' => [
                'if they don’t feel well.',
            ],
        ],

        'My dog will bark' => [
            'emoji' => '🐶',
            'items' => [
                'if it sees a strange person.',
            ],
        ],

        'I won’t take the bus' => [
            'emoji' => '🚍',
            'items' => [
                'if it is crowded.',
            ],
        ],

        'Where will your parents travel' => [
            'emoji' => '✈️',
            'items' => [
                'if they have enough free time?',
            ],
        ],

        'What will you buy for Christmas' => [
            'emoji' => '🎄',
            'items' => [
                'if you have money?',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])