<?php
$content = [
    'type'=>'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Find the mistake in each sentence',

    'questions' => [
        [
            'emoji' => '📚🕕',
            'prompt' => "I were studying Maths at 6 o'clock yesterday.",
            'correct' => 'wrong',
            'options' => ['correct', 'wrong']
        ],
        [
            'emoji' => '🍽️👨',
            'prompt' => 'My dad was washing the dishes at 5 in the evening.',
            'correct' => 'correct',
            'options' => ['correct', 'wrong']
        ],
        [
            'emoji' => '👴👓',
            'prompt' => 'My grandpa was looked for his glasses all day.',
            'correct' => 'wrong',
            'options' => ['correct', 'wrong']
        ],
        [
            'emoji' => '👩‍👦📺',
            'prompt' => 'My mum and I was watching TV at 8 p.m.',
            'correct' => 'wrong',
            'options' => ['correct', 'wrong']
        ],
        [
            'emoji' => '🎮🕹️',
            'prompt' => 'Fred was played video games 10 minutes ago.',
            'correct' => 'wrong',
            'options' => ['correct', 'wrong']
        ],
        [
            'emoji' => '👧📝',
            'prompt' => "My sister was doing her homework at 4 o'clock.",
            'correct' => 'correct',
            'options' => ['correct', 'wrong']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])