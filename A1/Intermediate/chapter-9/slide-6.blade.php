<?php
$content = [
    'page_title'    => 'Packing Categories',
    'title'         => 'What should you take?',
    'subtitle'      => 'Drag each word into the correct place and sentence group',

    'places' => [
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

    'phrases' => [
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
        ['text' => 'A bathing suit',     'place' => 'beach',     'phrase' => 'need',    'placed' => true],
        ['text' => 'Sandals',            'place' => 'beach',     'phrase' => 'should'],
        ['text' => 'A towel',            'place' => 'beach',     'phrase' => 'need'],
        ['text' => 'Insect repellent',   'place' => 'camping',   'phrase' => 'should'],
        ['text' => 'A tent',             'place' => 'camping',   'phrase' => 'have_to', 'placed' => true],
        ['text' => 'A sleeping bag',     'place' => 'camping',   'phrase' => 'have_to'],
        ['text' => 'A first-aid kit',    'place' => 'camping',   'phrase' => 'should'],
        ['text' => 'A brush',            'place' => 'overnight', 'phrase' => 'need'],
        ['text' => 'A hair dryer',       'place' => 'overnight', 'phrase' => 'should'],
        ['text' => 'Makeup',             'place' => 'overnight', 'phrase' => 'should'],
        ['text' => 'Shampoo',            'place' => 'overnight', 'phrase' => 'need'],
        ['text' => 'A pair of scissors', 'place' => 'camping', 'phrase' => 'should'],
        ['text' => 'Pajamas',            'place' => 'overnight', 'phrase' => 'have_to'],
        ['text' => 'Sunscreen',          'place' => 'beach',     'phrase' => 'should',  'placed' => true],
        ['text' => 'A toothbrush',       'place' => 'overnight', 'phrase' => 'have_to'],
        ['text' => 'Toothpaste',         'place' => 'overnight', 'phrase' => 'need'],
        ['text' => 'Soap',               'place' => 'overnight', 'phrase' => 'should'],
        ['text' => 'A razor',            'place' => 'overnight', 'phrase' => 'should'],
        ['text' => 'Batteries',          'place' => 'camping',   'phrase' => 'need'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])