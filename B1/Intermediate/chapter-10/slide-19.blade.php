<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => 'Fill in the Blanks',

    'items' => [
        [
            'emoji'   => '🚶',
            'prefix'  => 'Jessica and Mark were taking a',
            'hint'    => '',
            'suffix'  => 'in New York City.',
            'answer'  => 'walk',
            'answers' => ['walk'],
        ],
        [
            'emoji'   => '🚚',
            'prefix'  => 'A dangerous',
            'hint'    => '',
            'suffix'  => 'lost control and headed toward the sidewalk.',
            'answer'  => 'truck',
            'answers' => ['truck'],
        ],
        [
            'emoji'   => '🏪',
            'prefix'  => 'A',
            'hint'    => '',
            'suffix'  => 'warned the crowd about the danger.',
            'answer'  => 'shopkeeper',
            'answers' => ['shopkeeper'],
        ],
        [
            'emoji'   => '🚑',
            'prefix'  => 'Firefighters and',
            'hint'    => '',
            'suffix'  => 'arrived to help people.',
            'answer'  => 'paramedics',
            'answers' => ['paramedics'],
        ],
        [
            'emoji'   => '🤝',
            'prefix'  => 'The story teaches us that courage, kindness, and',
            'hint'    => '',
            'suffix'  => 'can save lives.',
            'answer'  => 'teamwork',
            'answers' => ['teamwork'],
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])