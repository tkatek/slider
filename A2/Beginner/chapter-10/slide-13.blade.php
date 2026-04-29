<?php
$content = [
    'type'       => 'emoji',
    'page_title' => 'Quick Practice',
    'title'      => 'Quick Practice',
    'subtitle'   => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '🚶🚶',
            'prompt'  => 'You .... walk more.',
            'correct' => 'should',
            'options' => [
                'should',
                "shouldn’t",
            ],
        ],
        [
            'emoji'   => '🪑⏰',
            'prompt'  => 'You .... sit all day.',
            'correct' => "shouldn’t",
            'options' => [
                'should',
                "shouldn’t",
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])