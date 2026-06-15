<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 3',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '💰',
            'prompt'  => 'If you . . . . . . . me the money, I wouldn’t have bought the ticket.',
            'correct' => 'hadn’t lent',
            'options' => ['didn’t lend', 'hadn’t lent', 'lend', 'lent'],
        ],
        [
            'emoji'   => '🙋',
            'prompt'  => 'If Mike . . . . . . . me, I could have helped him.',
            'correct' => 'had asked',
            'options' => ['had asked', 'asked', 'had askt', 'will ask'],
        ],
        [
            'emoji'   => '😢',
            'prompt'  => 'I would have been very sad if you . . . . . . .',
            'correct' => 'hadn’t come',
            'options' => ['don’t come', 'didn’t come', 'would not have come', 'hadn’t come'],
        ],
        [
            'emoji'   => '☎️',
            'prompt'  => 'If I had phoned you, . . . . . . .',
            'correct' => 'you would have known the truth',
            'options' => ['you would have known the truth', 'you knew the truth', 'you had known the truth', 'you would know the truth'],
        ],
        [
            'emoji'   => '🎉',
            'prompt'  => 'If Jane had gone to a party, . . . . . . .',
            'correct' => 'I would have gone too',
            'options' => ['I will go too', 'I would have gone too', 'I had go too', 'I would had gone too'],
        ],
        [
            'emoji'   => '☔',
            'prompt'  => 'If I . . . . . . ., I would have got wet.',
            'correct' => 'hadn’t taken my umbrella',
            'options' => ['hadn’t taked my umbrella', 'took my umbrella', 'had took my umbrella', 'hadn’t taken my umbrella'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])