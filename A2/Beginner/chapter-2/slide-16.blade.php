<?php
$content = [
    'title' => 'Quick Practice',
    'subtitle' => 'Correct the verbs in the present simple tense',

    'questions' => [
        [
            'prefix' => 'I',
            'suffix' => 'outdoors in the summer.',
            'hint' => 'play',
            'answers' => ['play'],
        ],
        [
            'prefix' => 'He',
            'suffix' => 'football in summer.',
            'hint' => 'play',
            'answers' => ['plays'],
        ],
        [
            'prefix' => 'She',
            'suffix' => 'winter.',
            'hint' => 'not / like',
            'answers' => ["doesn't like", 'does not like'],
        ],
        [
            'prefix' => 'It',
            'suffix' => 'in autumn.',
            'hint' => 'rain',
            'answers' => ['rains'],
        ],
        [
            'prefix' => 'They',
            'suffix' => 'on vacation in winter.',
            'hint' => 'not / go',
            'answers' => ["don't go", 'do not go'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
