<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 3',
    'subtitle' => 'Read the expression and choose the correct verb.',

    'questions' => [
        [
            'emoji'   => '💡',
            'prompt'  => '. . . . . . new ideas',
            'correct' => 'Consider',
            'options' => [
                'Consider',
                'Build',
                'Solve',
                'Show',
            ],
        ],
        [
            'emoji'   => '👀',
            'prompt'  => '. . . . . . another perspective',
            'correct' => 'See',
            'options' => [
                'Build',
                'Learn',
                'See',
                'Appreciate',
            ],
        ],
        [
            'emoji'   => '📚',
            'prompt'  => '. . . . . . from others',
            'correct' => 'Learn',
            'options' => [
                'Learn',
                'Think',
                'Show',
                'Solve',
            ],
        ],
        [
            'emoji'   => '🤝',
            'prompt'  => '. . . . . . stronger friendships',
            'correct' => 'Build',
            'options' => [
                'Appreciate',
                'Build',
                'Ask',
                'Consider',
            ],
        ],
        [
            'emoji'   => '❓',
            'prompt'  => '. . . . . . questions',
            'correct' => 'Ask',
            'options' => [
                'Think',
                'Build',
                'Ask',
                'Learn',
            ],
        ],
        [
            'emoji'   => '👂',
            'prompt'  => '. . . . . . interest in others',
            'correct' => 'Show',
            'options' => [
                'Solve',
                'Show',
                'Consider',
                'Avoid',
            ],
        ],
        [
            'emoji'   => '⚖️',
            'prompt'  => '. . . . . . quick judgments',
            'correct' => 'Avoid',
            'options' => [
                'Appreciate',
                'Build',
                'Avoid',
                'Learn',
            ],
        ],
        [
            'emoji'   => '🙏',
            'prompt'  => '. . . . . . differences',
            'correct' => 'Appreciate',
            'options' => [
                'Appreciate',
                'Ask',
                'Solve',
                'Consider',
            ],
        ],
        [
            'emoji'   => '❤️',
            'prompt'  => ". . . . . . about another person's feelings",
            'correct' => 'Think',
            'options' => [
                'Learn',
                'Think',
                'Build',
                'Ask',
            ],
        ],
        [
            'emoji'   => '🧩',
            'prompt'  => '. . . . . . problems together',
            'correct' => 'Solve',
            'options' => [
                'Show',
                'Appreciate',
                'Solve',
                'Consider',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])