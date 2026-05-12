<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 1: Warm-up',
    'subtitle' => 'Let’s revise some vocabulary!<br>Read & choose the correct definition word that describes the sentence.',

    'questions' => [
        [
            'emoji' => '🎯📝',
            'prompt' => 'To decide what you want to achieve.',
            'correct' => 'set goal',
            'options' => [
                'celebrate goal',
                'set goal',
            ],
        ],
        [
            'emoji' => '🏆✅',
            'prompt' => 'To successfully reach a goal.',
            'correct' => 'achieve',
            'options' => [
                'create',
                'achieve',
            ],
        ],
        [
            'emoji' => '⏰📌',
            'prompt' => 'The final time to finish something.',
            'correct' => 'deadline',
            'options' => [
                'deadline',
                'urgency',
            ],
        ],
        [
            'emoji' => '📏✅',
            'prompt' => 'Possible to achieve.',
            'correct' => 'attainable',
            'options' => [
                'measurable',
                'attainable',
            ],
        ],
        [
            'emoji' => '🚨⚡',
            'prompt' => 'When you feel you have to do something quickly.',
            'correct' => 'urgent',
            'options' => [
                'urgent',
                'relevant',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])