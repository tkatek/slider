<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => '',

    'questions' => [
        [
            'emoji' => '💬',
            'prompt' => 'If he . . . . . . . her out, she would say yes.',
            'correct' => 'asked',
            'options' => ['would ask', 'asked'],
        ],
        [
            'emoji' => '🇪🇸',
            'prompt' => 'If we . . . . . . . Spanish, I would go on holiday to Spain.',
            'correct' => 'spoke',
            'options' => ['spoke', 'would speak'],
        ],
        [
            'emoji' => '💰',
            'prompt' => 'I . . . . . . . very rich if I won the lottery.',
            'correct' => 'would be',
            'options' => ['would be', 'was'],
        ],
        [
            'emoji' => '🙏',
            'prompt' => 'If you . . . . . . . sorry, she would make up with you.',
            'correct' => 'said',
            'options' => ['said', 'would say'],
        ],
        [
            'emoji' => '❤️',
            'prompt' => 'He would ask you out if you . . . . . . . him up.',
            'correct' => 'chatted',
            'options' => ['would chat', 'chatted'],
        ],
        [
            'emoji' => '💼',
            'prompt' => 'If they worked harder, they . . . . . . . more money.',
            'correct' => 'would earn',
            'options' => ['earned', 'would earn'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])