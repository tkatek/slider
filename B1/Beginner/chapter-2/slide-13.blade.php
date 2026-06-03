<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Kind or unkind?',

    'questions' => [
        [
            'emoji'   => '💐🤒',
            'prompt'  => 'Sarah brought her sick friend some flowers.',
            'correct' => 'Kind',
            'options' => ['Kind', 'Unkind']
        ],
        [
            'emoji'   => '👦🦯',
            'prompt'  => 'The young boy helped a blind man cross the road.',
            'correct' => 'Kind',
            'options' => ['Kind', 'Unkind']
        ],
        [
            'emoji'   => '😂🤕',
            'prompt'  => 'A boy laughed at his classmate after tripping on the floor.',
            'correct' => 'Unkind',
            'options' => ['Kind', 'Unkind']
        ],
        [
            'emoji'   => '🎂💌',
            'prompt'  => 'John gave his mum a homemade birthday card.',
            'correct' => 'Kind',
            'options' => ['Kind', 'Unkind']
        ],
        [
            'emoji'   => '🌸👣',
            'prompt'  => 'Jane stepped on the flowers her mum planted.',
            'correct' => 'Unkind',
            'options' => ['Kind', 'Unkind']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])