<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Complete the sentences with who, that, which, where, or when.',

    'items' => [
        [
            'emoji'   => '🧑‍🏫',
            'prefix'  => 'The mentor',
            'hint'    => '',
            'suffix'  => 'helped me believe in myself changed my life.',
            'answer'  => 'who',
            'answers' => ['who', 'that'],
        ],
        [
            'emoji'   => '📝',
            'prefix'  => 'The workshop',
            'hint'    => '',
            'suffix'  => 'I attended last weekend was very useful.',
            'answer'  => 'which',
            'answers' => ['which', 'that'],
        ],
        [
            'emoji'   => '🎨',
            'prefix'  => 'This is the painting',
            'hint'    => '',
            'suffix'  => 'my grandmother made.',
            'answer'  => 'which',
            'answers' => ['which', 'that'],
        ],
        [
            'emoji'   => '👥',
            'prefix'  => 'The people',
            'hint'    => '',
            'suffix'  => 'surround us can inspire us every day.',
            'answer'  => 'who',
            'answers' => ['who', 'that'],
        ],
        [
            'emoji'   => '⭐',
            'prefix'  => 'I was twelve years old',
            'hint'    => '',
            'suffix'  => 'I decided to follow my passion.',
            'answer'  => 'when',
            'answers' => ['when'],
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])