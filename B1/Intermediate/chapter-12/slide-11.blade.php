<?php
$content = [
    'title'    => 'Open or Close-minded?',
    'subtitle' => 'Read each sentence and choose the correct answer.',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => '“I’ve never done that before. I would love for you to teach me.”',
            'correct' => '🟢 Open-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“We don’t celebrate that. Everyone does things the same way.”',
            'correct' => '🔴 Closed-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“You have two mums? That’s really cool!”',
            'correct' => '🟢 Open-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“We don’t eat that at home, but I would love to try it.”',
            'correct' => '🟢 Open-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“Ew! What’s that smell? That food looks gross!”',
            'correct' => '🔴 Closed-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“My family doesn’t celebrate that. Can you tell me more about it?”',
            'correct' => '🟢 Open-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
        [
            'prompt'  => '“You look really silly. Why are you wearing that?”',
            'correct' => '🔴 Closed-minded',
            'options' => [
                '🟢 Open-minded',
                '🔴 Closed-minded',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])