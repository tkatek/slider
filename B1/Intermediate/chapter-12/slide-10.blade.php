<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Bonus Challenge',
    'subtitle' => 'Choose the correct verb.',

    'questions' => [
        [
            'emoji'   => '🌍',
            'prompt'  => '. . . . . . open-minded',
            'correct' => 'Be',
            'options' => [
                'Build',
                'Be',
                'Ask',
                'Think',
            ],
        ],
        [
            'emoji'   => '👂',
            'prompt'  => '. . . . . . without judging',
            'correct' => 'Listen',
            'options' => [
                'Listen',
                'Show',
                'Solve',
                'Build',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])