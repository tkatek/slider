<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Was or were?',

    'questions' => [
        [
            'emoji'   => '🌳👫',
            'prompt'  => 'They ___ at the park yesterday.',
            'correct' => 'were',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '🏥👦',
            'prompt'  => 'Yesterday Tom ____ at the hospital.',
            'correct' => 'was',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '⚽😊',
            'prompt'  => 'My friends ____ happy to play football.',
            'correct' => 'were',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '🦁👧',
            'prompt'  => 'Lisa ____ at the zoo last weekend.',
            'correct' => 'was',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '☀️🔥',
            'prompt'  => 'Last summer ____ hot.',
            'correct' => 'was',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '📘✨',
            'prompt'  => 'The book ____ very interesting.',
            'correct' => 'was',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '🧸🛍️',
            'prompt'  => 'We ____ at the toyshop yesterday.',
            'correct' => 'were',
            'options' => ['was', 'were'],
        ],
        [
            'emoji'   => '🏠🏊',
            'prompt'  => 'Parents ____ in the house, and I ____ in the swimming pool.',
            'correct' => 'were / was',
            'options' => ['were / was', 'was / were'],
        ],
        [
            'emoji'   => '🎭🙋',
            'prompt'  => 'I ____ at the theatre last week.',
            'correct' => 'was',
            'options' => ['was', 'were'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])