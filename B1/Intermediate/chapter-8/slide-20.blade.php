<?php
$content = [

    'title'       => 'Practice 8',
    'subtitle'    => 'Drag each phrasal verb from the box and drop it next to the correct meaning.',
    'row_heading' => 'Meaning',

    'rows' => [
        [
            'key'   => 'spend-time',
            'title' => 'spend time together socially',
            'emoji' => '🤝',
        ],
        [
            'key'   => 'solution',
            'title' => 'found a solution',
            'emoji' => '💡',
        ],
        [
            'key'   => 'available',
            'title' => 'became available',
            'emoji' => '🎬',
        ],
        [
            'key'   => 'explore',
            'title' => 'visit or explore a place',
            'emoji' => '🗺️',
        ],
        [
            'key'   => 'meal',
            'title' => 'went out to have a meal',
            'emoji' => '🍽️',
        ],
        [
            'key'   => 'proved',
            'title' => 'happened / proved to be',
            'emoji' => '⭐',
        ],
        [
            'key'   => 'not-included',
            'title' => 'not included',
            'emoji' => '🚫',
        ],
    ],

    'columns' => [
        [
            'key'   => 'phrasal_verb',
            'title' => 'Phrasal Verb',
            'short' => 'Phrasal Verb',
        ],
    ],

    'items' => [
        ['text' => 'hang out',   'row' => 'spend-time',   'column' => 'phrasal_verb'],
        ['text' => 'worked out', 'row' => 'solution',     'column' => 'phrasal_verb'],
        ['text' => 'came out',   'row' => 'available',    'column' => 'phrasal_verb'],
        ['text' => 'check out',  'row' => 'explore',      'column' => 'phrasal_verb'],
        ['text' => 'ate out',    'row' => 'meal',         'column' => 'phrasal_verb'],
        ['text' => 'turned out', 'row' => 'proved',       'column' => 'phrasal_verb'],
        ['text' => 'left out',   'row' => 'not-included', 'column' => 'phrasal_verb'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])