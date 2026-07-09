<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => 'Complete each sentence using the correct relative pronoun',

    'items' => [
        [
            'emoji'   => '👥',
            'prefix'  => 'The people',
            'hint'    => '',
            'suffix'  => 'inspired me were my parents.',
            'answer'  => 'who',
            'answers' => ['who', 'that'],
        ],
        [
            'emoji'   => '📖',
            'prefix'  => 'I read a book',
            'hint'    => '',
            'suffix'  => 'changed my way of thinking.',
            'answer'  => 'which',
            'answers' => ['which', 'that'],
        ],
        [
            'emoji'   => '👨‍👩‍👧',
            'prefix'  => 'Parents are people',
            'hint'    => '',
            'suffix'  => 'support and guide us.',
            'answer'  => 'who',
            'answers' => ['who', 'that'],
        ],
        [
            'emoji'   => '🌍',
            'prefix'  => 'I enjoy places',
            'hint'    => '',
            'suffix'  => 'I can learn about different cultures.',
            'answer'  => 'where',
            'answers' => ['where'],
        ],
        [
            'emoji'   => '⏳',
            'prefix'  => 'There was a time',
            'hint'    => '',
            'suffix'  => 'I wanted to become an architect.',
            'answer'  => 'when',
            'answers' => ['when'],
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])