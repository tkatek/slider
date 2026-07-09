<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Comparative & superlative',

    'questions' => [
        [
            'emoji' => '🚌🌱',
            'prompt' => 'Public transportation is __________ for the environment than driving a car.',
            'correct' => 'better',
            'options' => ['more good', 'better', 'the best'],
        ],
        [
            'emoji' => '☀️⚡',
            'prompt' => 'Solar energy is one of __________ renewable energy sources we have today.',
            'correct' => 'the cleanest',
            'options' => ['more clean', 'cleaner', 'the cleanest'],
        ],
        [
            'emoji' => '🚲🌍',
            'prompt' => 'Riding a bike is __________ than driving a car for the environment.',
            'correct' => 'better',
            'options' => ['good', 'better', 'the best'],
        ],
        [
            'emoji' => '🌳💨',
            'prompt' => 'Planting trees is one of __________ ways to improve air quality.',
            'correct' => 'the most effective',
            'options' => ['more effective', 'effective', 'the most effective'],
        ],
        [
            'emoji' => '🌎🤝',
            'prompt' => 'Protecting the environment is __________ important responsibility we all share.',
            'correct' => 'the most',
            'options' => ['more', 'most', 'the most'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])