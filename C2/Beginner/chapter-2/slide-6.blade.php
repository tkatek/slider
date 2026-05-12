<?php
$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the gaps!',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix' => '💭 You need to',
            'suffix' => 'your opinion by giving clear reasons.',
            'answers' => ['justify', 'explain', 'support'],
        ],
        [
            'prefix' => '🧠 His',
            'suffix' => 'was logical and easy to understand.',
            'answers' => ['argument', 'reasoning'],
        ],
        [
            'prefix' => '📌 She provided strong',
            'suffix' => 'to support her idea.',
            'answers' => ['evidence', 'proof'],
        ],
        [
            'prefix' => '👀 From my',
            'suffix' => ', this solution is the best option.',
            'answers' => ['perspective', 'point of view', 'view'],
        ],
        [
            'prefix' => '↩️ He responded to the',
            'suffix' => 'before giving his final conclusion.',
            'answers' => ['counterargument', 'counter argument', 'opposing argument', 'opposing idea'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
