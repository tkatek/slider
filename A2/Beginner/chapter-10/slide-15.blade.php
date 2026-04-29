<?php
$content = [
    'title' => 'Quick Wrap up!',
    'subtitle' => 'Complete the sentence',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix' => 'If you exercise and eat well, you will be',
            'suffix' => '',
            'hint' => 'healthy',
            'answers' => ['healthy'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
