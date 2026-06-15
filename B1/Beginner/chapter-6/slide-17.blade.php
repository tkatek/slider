<?php
$content = [
    'page_title'  => 'Practice 7',
    'title'       => 'Practice 7: do / play / go',
    'subtitle'    => 'Complete the table with the sports and activities below',
    'row_heading' => 'Verb',

    'rows' => [
        [
            'key'   => 'do',
            'title' => 'do +',
            'emoji' => '✅',
        ],
        [
            'key'   => 'play',
            'title' => 'play +',
            'emoji' => '🎮',
        ],
        [
            'key'   => 'go',
            'title' => 'go +',
            'emoji' => '➡️',
        ],
    ],

    'columns' => [
        [
            'key'   => 'activities',
            'title' => 'Sports and activities',
            'short' => 'Activities',
        ],
    ],

    'items' => [
        ['text' => 'Drama',                'row' => 'do',   'column' => 'activities'],
        ['text' => 'Martial arts',         'row' => 'do',   'column' => 'activities'],
        ['text' => 'Photography',          'row' => 'do',   'column' => 'activities'],
        ['text' => 'Gymnastics',           'row' => 'do',   'column' => 'activities'],
        ['text' => 'Weightlifting',        'row' => 'do',   'column' => 'activities'],
        ['text' => 'Ballet',               'row' => 'do',   'column' => 'activities'],

        ['text' => 'Basketball',           'row' => 'play', 'column' => 'activities'],
        ['text' => 'Board games',          'row' => 'play', 'column' => 'activities'],
        ['text' => 'A musical instrument', 'row' => 'play', 'column' => 'activities'],
        ['text' => 'Volleyball',           'row' => 'play', 'column' => 'activities'],
        ['text' => 'Chess',                'row' => 'play', 'column' => 'activities'],
        ['text' => 'Ice hockey',           'row' => 'play', 'column' => 'activities'],
        ['text' => 'Cards',                'row' => 'play', 'column' => 'activities'],
        ['text' => 'Table tennis',         'row' => 'play', 'column' => 'activities'],

        ['text' => 'Cycling',              'row' => 'go',   'column' => 'activities'],
        ['text' => 'Rollerblading',        'row' => 'go',   'column' => 'activities'],
        ['text' => 'Running',              'row' => 'go',   'column' => 'activities'],
        ['text' => 'Shopping',             'row' => 'go',   'column' => 'activities'],
        ['text' => 'Skateboarding',        'row' => 'go',   'column' => 'activities'],
        ['text' => 'Horse riding',         'row' => 'go',   'column' => 'activities'],
        ['text' => 'Bowling',              'row' => 'go',   'column' => 'activities'],
        ['text' => 'Camping',              'row' => 'go',   'column' => 'activities'],
        ['text' => 'Ice skating',          'row' => 'go',   'column' => 'activities'],
        ['text' => 'Ballroom dancing',     'row' => 'go',   'column' => 'activities'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])