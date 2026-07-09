<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct option.',

    'questions' => [
        [
            'emoji'   => '🎓',
            'prompt'  => "I'm thinking . . . . . . changing my major.",
            'correct' => 'about',
            'options' => [
                'on',
                'about',
                'for',
                'with',
            ],
        ],
        [
            'emoji'   => '🎉',
            'prompt'  => 'She is looking forward . . . . . . her birthday party.',
            'correct' => 'to',
            'options' => [
                'in',
                'to',
                'for',
                'about',
            ],
        ],
        [
            'emoji'   => '🍝',
            'prompt'  => 'Tom is good . . . . . . cooking Italian food.',
            'correct' => 'at',
            'options' => [
                'on',
                'at',
                'with',
                'for',
            ],
        ],
        [
            'emoji'   => '🔍',
            'prompt'  => 'We are interested . . . . . . your project.',
            'correct' => 'in',
            'options' => [
                'at',
                'in',
                'on',
                'for',
            ],
        ],
        [
            'emoji'   => '🏆',
            'prompt'  => 'They are proud . . . . . . their daughter.',
            'correct' => 'of',
            'options' => [
                'with',
                'of',
                'at',
                'in',
            ],
        ],
        [
            'emoji'   => '🕷️',
            'prompt'  => 'I am afraid . . . . . . spiders!',
            'correct' => 'of',
            'options' => [
                'of',
                'for',
                'in',
                'on',
            ],
        ],
        [
            'emoji'   => '📣',
            'prompt'  => 'She insists . . . . . . doing everything perfectly.',
            'correct' => 'on',
            'options' => [
                'on',
                'at',
                'in',
                'for',
            ],
        ],
        [
            'emoji'   => '🤝',
            'prompt'  => 'We depend . . . . . . our teacher for help.',
            'correct' => 'on',
            'options' => [
                'in',
                'of',
                'on',
                'at',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])