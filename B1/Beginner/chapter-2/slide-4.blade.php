<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Warm up:  Practice 2',
    'subtitle' => 'Read & choose the correct answer',

    'questions' => [
        [
            'emoji' => '🪴🙏',
            'prompt' => 'Would you be able . . . . . . . the plant for me?',
            'correct' => 'to water',
            'options' => ['water', 'to water', 'waters']
        ],
        [
            'emoji' => '📦🤝',
            'prompt' => 'Could you help me . . . . . . .?',
            'correct' => 'move',
            'options' => ['move', 'moving', 'to move']
        ],
        [
            'emoji' => '🐱🥣',
            'prompt' => 'Would you mind . . . . . . . my cat?',
            'correct' => 'feeding',
            'options' => ['to feed', 'feed', 'feeding']
        ],
        [
            'emoji' => '💼🙏',
            'prompt' => 'I need a favour! . . . . . . . you be able to work on this project?',
            'correct' => 'Would',
            'options' => ['Could', 'Can', 'Would']
        ],
        [
            'emoji' => '📱🤲',
            'prompt' => 'Would you . . . . . . . me your phone?',
            'correct' => 'lend',
            'options' => ['lend', 'lends']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])