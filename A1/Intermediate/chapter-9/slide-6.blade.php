<?php
$content = [
    'page_title'    => 'Packing Categories',
    'title'         => 'What should you take?',
    'subtitle'      => 'Drag each word into the correct place and sentence group',
    'row_heading'   => 'Trips',

    'rows' => [
        [
            'key'   => 'beach',
            'title' => 'On a beach vacation',
            'emoji' => '🏖️',
        ],
        [
            'key'   => 'camping',
            'title' => 'On a camping trip',
            'emoji' => '🏕️',
        ],
        [
            'key'   => 'overnight',
            'title' => 'To stay overnight with a friend',
            'emoji' => '🛏️',
        ],
    ],

    'columns' => [
        [
            'key'   => 'need',
            'title' => 'I need to take',
            'short' => 'Need',
        ],
        [
            'key'   => 'should',
            'title' => 'I should take',
            'short' => 'Should',
        ],
        [
            'key'   => 'have_to',
            'title' => 'I have to take',
            'short' => 'Have to',
        ],
    ],

    'items' => [
        ['text' => 'A bathing suit',     'row' => 'beach',     'column' => 'need',    'placed' => true],
        ['text' => 'Sandals',            'row' => 'beach',     'column' => 'should'],
        ['text' => 'A towel',            'row' => 'beach',     'column' => 'need'],
        ['text' => 'Insect repellent',   'row' => 'camping',   'column' => 'should'],
        ['text' => 'A tent',             'row' => 'camping',   'column' => 'have_to', 'placed' => true],
        ['text' => 'A sleeping bag',     'row' => 'camping',   'column' => 'have_to'],
        ['text' => 'A first-aid kit',    'row' => 'camping',   'column' => 'should'],
        ['text' => 'A brush',            'row' => 'overnight', 'column' => 'need'],
        ['text' => 'A hair dryer',       'row' => 'overnight', 'column' => 'should'],
        ['text' => 'Makeup',             'row' => 'overnight', 'column' => 'should'],
        ['text' => 'Shampoo',            'row' => 'overnight', 'column' => 'need'],
        ['text' => 'A pair of scissors', 'row' => 'camping', 'column' => 'should'],
        ['text' => 'Pajamas',            'row' => 'overnight', 'column' => 'have_to'],
        ['text' => 'Sunscreen',          'row' => 'beach',     'column' => 'should',  'placed' => true],
        ['text' => 'A toothbrush',       'row' => 'overnight', 'column' => 'have_to'],
        ['text' => 'Toothpaste',         'row' => 'overnight', 'column' => 'need'],
        ['text' => 'Soap',               'row' => 'overnight', 'column' => 'should'],
        ['text' => 'A razor',            'row' => 'overnight', 'column' => 'should'],
        ['text' => 'Batteries',          'row' => 'camping',   'column' => 'need'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])
