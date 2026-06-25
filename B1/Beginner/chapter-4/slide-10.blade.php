<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the Words with Their Definitions',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'genre',
            'left' => [
                'type' => 'word',
                'text' => '1. genre',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. a type or category of movie',
            ],
        ],
        [
            'id' => 'documentary',
            'left' => [
                'type' => 'word',
                'text' => '2. documentary',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. a film about real people or events',
            ],
        ],
        [
            'id' => 'lead-role',
            'left' => [
                'type' => 'word',
                'text' => '3. lead role',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. the main acting role',
            ],
        ],
        [
            'id' => 'stuntman',
            'left' => [
                'type' => 'word',
                'text' => '4. stuntman',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. a person who performs dangerous scenes',
            ],
        ],
        [
            'id' => 'extras',
            'left' => [
                'type' => 'word',
                'text' => '5. extras',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. actors who appear in the background',
            ],
        ],
        [
            'id' => 'plot',
            'left' => [
                'type' => 'word',
                'text' => '6. plot',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. the main story of a movie',
            ],
        ],
        [
            'id' => 'trailer',
            'left' => [
                'type' => 'word',
                'text' => '7. trailer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. a short preview of a movie',
            ],
        ],
        [
            'id' => 'special-effects',
            'left' => [
                'type' => 'word',
                'text' => '8. special effects',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'h. visual effects used in movies',
            ],
        ],
    ],

    'right_order' => [
        'extras',
        'plot',
        'trailer',
        'genre',
        'documentary',
        'lead-role',
        'stuntman',
        'special-effects',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])