<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Read & choose the right answer',

    'questions' => [
        [
            'emoji'   => '🎮👦',
            'prompt'  => 'They __________ computer games yesterday.',
            'correct' => "didn't play",
            'options' => ["didn't played", "didn't play", "weren't play"],
        ],
        [
            'emoji'   => '💻🏠',
            'prompt'  => 'They __________ from home this morning.',
            'correct' => "didn't work",
            'options' => ['worked', "didn't worked", "didn't work"],
        ],
        [
            'emoji'   => '📖🏫',
            'prompt'  => 'She __________ a comic at school.',
            'correct' => "didn't read",
            'options' => ["didn't read", 'read', "didn't readed"],
        ],
        [
            'emoji'   => '🏝️✈️',
            'prompt'  => 'We __________ to Hawaii last summer.',
            'correct' => "didn't go",
            'options' => ["didn't went", 'goed', "didn't go"],
        ],
        [
            'emoji'   => '📺📰',
            'prompt'  => 'He __________ the news on TV.',
            'correct' => "didn't watch",
            'options' => ["didn't watch", 'watched', "didn't watched"],
        ],
        [
            'emoji'   => '🐎🌳',
            'prompt'  => 'He __________ a horse in the park last Sunday.',
            'correct' => "didn't ride",
            'options' => ['rode', "didn't rode", "didn't ride"],
        ],
        [
            'emoji'   => '🍰🍽️',
            'prompt'  => 'She __________ dinner last night. She made a cake.',
            'correct' => "didn't cook",
            'options' => ["didn't cook", "didn't cooked", 'cooked'],
        ],
        [
            'emoji'   => '🌧️❄️',
            'prompt'  => 'It __________ on Monday. It snowed.',
            'correct' => "didn't rain",
            'options' => ['rained', "didn't rain", "didn't rained"],
        ],
        [
            'emoji'   => '🚿🛁',
            'prompt'  => 'He __________ a shower.',
            'correct' => "didn't take",
            'options' => ["didn't take", "didn't took", 'took'],
        ],
        [
            'emoji'   => '👶😊',
            'prompt'  => 'The baby __________.',
            'correct' => "didn't smile",
            'options' => ['smiled', "didn't smile", "didn't smiled"],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])