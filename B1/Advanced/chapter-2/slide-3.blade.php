<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Warm up: Practice 1',
    'subtitle' => 'Complete the sentences with the correct modals of deduction',

    'questions' => [
        [
            'emoji'   => '📞',
            'prompt'  => "There's no reply. He . . . . . be out.",
            'correct' => 'must',
            'options' => [
                'can',
                'must',
                "can't",
                "mustn't",
            ],
        ],
        [
            'emoji'   => '📚',
            'prompt'  => "I've got no idea where she is. Try the library. She . . . . . be in there.",
            'correct' => 'might',
            'options' => [
                'might',
                "can't",
                'must',
                'will',
            ],
        ],
        [
            'emoji'   => '🚶',
            'prompt'  => "Look at the way that guy's walking. He . . . . . be drunk!",
            'correct' => 'must',
            'options' => [
                'should',
                'can',
                'might',
                'must',
            ],
        ],
        [
            'emoji'   => '😴',
            'prompt'  => "'I've been working since 5 this morning.'",
            'correct' => 'You must be exhausted!',
            'options' => [
                'You would be exhausted!',
                'You can be exhausted!',
                'You must be exhausted!',
                'You might be exhausted!',
            ],
        ],
        [
            'emoji'   => '🍽️',
            'prompt'  => "You . . . . . be hungry again. You've only just had dinner!",
            'correct' => "can't",
            'options' => [
                "can't",
                "mustn't",
                'might',
                'may not',
            ],
        ],
        [
            'emoji'   => '⏱️',
            'prompt'  => "They . . . . . got there already. They only left ten minutes ago.",
            'correct' => "can't have",
            'options' => [
                "can't",
                'must',
                'must have',
                "can't have",
            ],
        ],
        [
            'emoji'   => '🏢',
            'prompt'  => "You . . . . . left it in the office, I suppose.",
            'correct' => '1 and 2 are both possible',
            'options' => [
                'could have',
                'might have',
                'must have',
                '1 and 2 are both possible',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])