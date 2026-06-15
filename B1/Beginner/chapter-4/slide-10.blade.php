<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the Words with Their Definitions',
    'left_label' => '',
    'right_label' => '',

    'pairs' => [
        [
            'id' => 'genre',
            'left' => [
                'type' => 'word',
                'text' => 'Genre',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A type or category of movie',
            ],
        ],
        [
            'id' => 'documentary',
            'left' => [
                'type' => 'word',
                'text' => 'Documentary',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A film about real people or events',
            ],
        ],
        [
            'id' => 'lead-role',
            'left' => [
                'type' => 'word',
                'text' => 'Lead Role',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'The main acting role',
            ],
        ],
        [
            'id' => 'stuntman',
            'left' => [
                'type' => 'word',
                'text' => 'Stuntman',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A person who performs dangerous scenes',
            ],
        ],
        [
            'id' => 'extras',
            'left' => [
                'type' => 'word',
                'text' => 'Extras',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Actors who appear in the background',
            ],
        ],
        [
            'id' => 'plot',
            'left' => [
                'type' => 'word',
                'text' => 'Plot',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'The main story of a movie',
            ],
        ],
        [
            'id' => 'trailer',
            'left' => [
                'type' => 'word',
                'text' => 'Trailer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A short preview of a movie',
            ],
        ],
        [
            'id' => 'special-effects',
            'left' => [
                'type' => 'word',
                'text' => 'Special Effects',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Visual effects used in movies',
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