<?php
$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the gaps!',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix' => '💬 I’d',
            'suffix' => 'that communication requires clarity.',
            'answers' => ['argue', 'say'],
        ],
        [
            'prefix' => '🏆 Success means different things depending on the',
            'suffix' => '.',
            'answers' => ['context', 'situation'],
        ],
        [
            'prefix' => '💡 That raises an interesting',
            'suffix' => '.',
            'answers' => ['point', 'question', 'issue'],
        ],
        [
            'prefix' => '👀 From my',
            'suffix' => ', this issue is complex.',
            'answers' => ['perspective', 'point of view', 'view'],
        ],
        [
            'prefix' => '🤝 I agree',
            'suffix' => 'some extent, but not entirely.',
            'answers' => ['to'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
