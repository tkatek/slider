<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'job vs work',

    'questions' => [
        [
            'emoji' => '👩‍💼⭐',
            'prompt' => 'She has such a good .......',
            'correct' => 'job',
            'options' => ['job', 'work'],
        ],
        [
            'emoji' => '⏰💼',
            'prompt' => 'I ....... from 1 to 9.',
            'correct' => 'work',
            'options' => ['job', 'work'],
        ],
        [
            'emoji' => '🚗🏢',
            'prompt' => 'How do you usually get to .......?',
            'correct' => 'work',
            'options' => ['job', 'work'],
        ],
        [
            'emoji' => '2️⃣💼',
            'prompt' => 'She has 2 .......',
            'correct' => 'jobs',
            'options' => ['jobs', 'works'],
        ],
        [
            'emoji' => '💪👩‍💻',
            'prompt' => 'She ....... really hard.',
            'correct' => 'works',
            'options' => ['jobs', 'works'],
        ],
        [
            'emoji' => '❤️💼',
            'prompt' => 'I love my .......',
            'correct' => 'job',
            'options' => ['job', 'work'],
        ],
        [
            'emoji' => '🕘💼',
            'prompt' => 'I have a full-time .......',
            'correct' => 'job',
            'options' => ['job', 'work'],
        ],
        [
            'emoji' => '🕒🔄',
            'prompt' => 'I ....... flexible hours.',
            'correct' => 'work',
            'options' => ['job', 'work'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])