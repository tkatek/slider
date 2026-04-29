<?php
$content = [
    'title' => 'Quick Practice',
    'subtitle' => 'Complete the sentences with (must / should / need to / important).',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix' => 'You',
            'suffix' => 'exercise to stay healthy.',
            'hint' => 'should',
            'answers' => ['should'],
        ],
        [
            'prefix' => 'It’s',
            'suffix' => 'to sleep well.',
            'hint' => 'important',
            'answers' => ['important'],
        ],
        [
            'prefix' => 'You',
            'suffix' => '(not / sit) for many hours.',
            'hint' => 'not / sit',
            'answers' => ["shouldn't sit", 'should not sit'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
