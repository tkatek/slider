<?php
$content = [
    'type'  => 'emoji',
    'title' => 'Past continuous',
    'subtitle' => 'What were you doing?',

    'questions' => [
        [
            'emoji'   => '💼🔥',
            'prompt'  => 'I was working hard.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '🦘🌿',
            'prompt'  => "You wasn't jumping.",
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '👩‍🍳🍲',
            'prompt'  => 'Was Marie cooking?',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '📚✏️',
            'prompt'  => 'Paul were studying.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '👨‍👩‍👧🎾',
            'prompt'  => 'My parents were playing tennis.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '📺🛋️',
            'prompt'  => 'You was watching TV.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '🗣️🚫',
            'prompt'  => "I wasn't speaking.",
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '👧📘',
            'prompt'  => 'Were she doing her homework?',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '😌🛋️',
            'prompt'  => 'We were relaxing.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '📖🧑‍🤝‍🧑',
            'prompt'  => 'Was they reading?',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '🏃‍♀️💨',
            'prompt'  => 'My sister was running.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji'   => '🧹🪣',
            'prompt'  => "Your best friend weren't cleaning.",
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])