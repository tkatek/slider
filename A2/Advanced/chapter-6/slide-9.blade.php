<?php
$content = [
    'page_title'     => 'Practice 3',
    'title'          => 'Practice 3',
    'subtitle'       => '',
    'activity_title' => 'Match each word with the correct definition.',
    'left_label'     => 'Words',
    'right_label'    => 'Definitions',

    'pairs' => [
        [
            'id' => 'immigrate',
            'left' => [
                'type' => 'word',
                'text' => 'Immigrate',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To move to a new country to live there permanently.',
            ],
        ],
        [
            'id' => 'immigrant',
            'left' => [
                'type' => 'word',
                'text' => 'Immigrant',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A person who moves to a different country to live.',
            ],
        ],
        [
            'id' => 'opportunities',
            'left' => [
                'type' => 'word',
                'text' => 'Opportunities',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Chances for a better situation or success.',
            ],
        ],
        [
            'id' => 'traditions',
            'left' => [
                'type' => 'word',
                'text' => 'Traditions',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Customs or beliefs passed down through generations.',
            ],
        ],
        [
            'id' => 'nervous',
            'left' => [
                'type' => 'word',
                'text' => 'Nervous',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Feeling worried or anxious about something.',
            ],
        ],
        [
            'id' => 'familiar',
            'left' => [
                'type' => 'word',
                'text' => 'Familiar',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Well-known or easily recognized.',
            ],
        ],
        [
            'id' => 'belong',
            'left' => [
                'type' => 'word',
                'text' => 'Belong',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'To feel like a proper or natural part of a group or place.',
            ],
        ],
        [
            'id' => 'routines',
            'left' => [
                'type' => 'word',
                'text' => 'Routines',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A sequence of actions regularly followed.',
            ],
        ],
    ],

];
?>

@include('slider.game.matching-pairs', ['content' => $content])
