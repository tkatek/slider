<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Let’s do some practice!',
    'subtitle' => 'Choose the correct answer',

    'questions'=> [
        [
            'emoji'   => '🍫',
            'prompt'  => 'A ____ of chocolate.',
            'correct' => 'bar',
            'options' => ['carton', 'cup', 'bar', 'bottle']
        ],
        [
            'emoji'   => '🍞',
            'prompt'  => 'A ____ of bread.',
            'correct' => 'loaf',
            'options' => ['piece', 'carton', 'loaf', 'slice']
        ],
        [
            'emoji'   => '🍕',
            'prompt'  => 'A ____ of pizza.',
            'correct' => 'slice',
            'options' => ['slice', 'bar', 'loaf', 'box']
        ],
        [
            'emoji'   => '🍲',
            'prompt'  => 'A ____ of soup.',
            'correct' => 'bowl',
            'options' => ['slice', 'carton', 'box', 'bowl']
        ],
        [
            'emoji'   => '☕',
            'prompt'  => 'A ____ of coffee.',
            'correct' => 'cup',
            'options' => ['bowl', 'sack', 'kilo', 'cup']
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
