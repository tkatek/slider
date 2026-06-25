<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 9',
    'subtitle' => 'Choose the correct answer (A, B, or C)',

    'questions' => [
        [
            'emoji' => '🥔📍',
            'prompt' => 'Where was the potato chip invented?',
            'correct' => 'New York',
            'options' => ['Texas', 'New York', 'California'],
        ],
        [
            'emoji' => '👨‍🍳🥔',
            'prompt' => 'Why did George Crum create thin potato slices?',
            'correct' => 'A customer complained',
            'options' => ['A customer complained', 'He wanted a new recipe', 'He had no potatoes'],
        ],
        [
            'emoji' => '🌽🥨',
            'prompt' => 'What is Fritos made from?',
            'correct' => 'Corn',
            'options' => ['Corn', 'Potatoes', 'Rice'],
        ],
        [
            'emoji' => '🏢🥤',
            'prompt' => 'What company did Frito-Lay later become part of?',
            'correct' => 'PepsiCo',
            'options' => ['PepsiCo', 'Coca-Cola', 'Nestlé'],
        ],
        [
            'emoji' => '😋🍟',
            'prompt' => 'Why do people like chips?',
            'correct' => 'They are easy to eat',
            'options' => ['They are expensive', 'They are easy to eat', 'They are only healthy'],
        ],
        [
            'emoji' => '⚠️🍟',
            'prompt' => 'What is a problem with snack chips?',
            'correct' => 'They are not very healthy',
            'options' => ['They have no taste', 'They are difficult to find', 'They are not very healthy'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])