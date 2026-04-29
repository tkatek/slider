<?php
$content = [
    'type'       => 'emoji',
    'page_title' => 'Quick Practice',
    'title'      => 'Quick Practice',
    'subtitle'   => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '💧',
            'prompt'  => 'You .... drink water every day.',
            'correct' => 'Must',
            'options' => [
                'Must',
                "Mustn't",
            ],
        ],
        [
            'emoji'   => '📚',
            'prompt'  => 'You .... take breaks while studying.',
            'correct' => 'Need to',
            'options' => [
                'Need to',
                'Need',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])