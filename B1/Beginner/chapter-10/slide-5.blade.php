<?php
$content = [
    'type' => 'emoji',

    'title'    => 'The Cookie Mystery',
    'subtitle' => '',

    'questions' => [
        [
            'emoji' => '🍪👧',
            'prompt' => 'Did Emma bake the cookies before or after they disappeared?',
            'correct' => 'Before',
            'options' => ['Before', 'After']
        ],
        [
            'emoji' => '🍪❓',
            'prompt' => 'Which happened first?',
            'correct' => 'Emma baked the cookies.',
            'options' => [
                'Emma baked the cookies.',
                'The cookies vanished.'
            ]
        ],
        [
            'emoji' => '🤖👦',
            'prompt' => 'Which happened first?',
            'correct' => 'Max built a robot.',
            'options' => [
                'Max built a robot.',
                'Emma talked to Max.'
            ]
        ],
        [
            'emoji' => '👨🍪',
            'prompt' => 'Which happened first?',
            'correct' => 'Arthur ate the cookies.',
            'options' => [
                'Arthur ate the cookies.',
                'Emma found Arthur.'
            ]
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])