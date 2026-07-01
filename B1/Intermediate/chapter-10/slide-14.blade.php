<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 6',
    'subtitle' => 'Choose the correct answer:',

    'questions' => [
        [
            'emoji'   => '🦁💪',
            'prompt'  => 'Which word means the same as brave?',
            'correct' => 'courageous',
            'options' => ['cowardly', 'courageous', 'weak']
        ],
        [
            'emoji'   => '😨❌',
            'prompt'  => 'Which word is the opposite of afraid?',
            'correct' => 'fearless',
            'options' => ['scared', 'nervous', 'fearless']
        ],
        [
            'emoji'   => '🤝✨',
            'prompt'  => 'Which word means the same as help?',
            'correct' => 'assist',
            'options' => ['ignore', 'assist', 'refuse']
        ],
        [
            'emoji'   => '🌟❌',
            'prompt'  => 'Which word is the opposite of known?',
            'correct' => 'unknown',
            'options' => ['famous', 'unknown', 'noticed']
        ],
        [
            'emoji'   => '🔥💡',
            'prompt'  => 'Which word means the same as inspire?',
            'correct' => 'motivate',
            'options' => ['motivate', 'discourage', 'stop']
        ],
        [
            'emoji'   => '🐜↔️🐘',
            'prompt'  => 'Which word is the opposite of small?',
            'correct' => 'big',
            'options' => ['tiny', 'big', 'little']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])