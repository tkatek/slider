<?php
$content = [
    'title'    => 'Practice 7',
    'subtitle' => 'Read each sentence and choose the correct answer.',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => "She isn't answering the phone. She . . . . . . out.",
            'correct' => 'might be',
            'options' => [
                'might be',
                'could to be',
                'can be',
                'may be',
            ],
        ],
        [
            'prompt'  => "They . . . . . . be Spanish, they're speaking Portuguese.",
            'correct' => "can't",
            'options' => [
                "mustn't",
                'can',
                "can't",
                'must',
            ],
        ],
        [
            'prompt'  => 'He drives an expensive car. He . . . . . . (steal) it.',
            'correct' => 'might have stolen',
            'options' => [
                'might have stolen',
                'should have stolen',
                'might be stealing',
                'should be stealing',
            ],
        ],
        [
            'prompt'  => "It's too early to have finished the exam. He . . . . . . (finish).",
            'correct' => "can't have finished",
            'options' => [
                "shouldn't have finished",
                "can't have finished",
                'must have finished',
            ],
        ],
        [
            'prompt'  => "I'm getting divorced. I . . . . . . (get married).",
            'correct' => "shouldn't have got married",
            'options' => [
                "mustn't have got married",
                "shouldn't have got married",
                "can't have got married",
            ],
        ],
        [
            'prompt'  => "She . . . . . . my directions. Why else is she late? I can't imagine any other reason for such behaviour!",
            'correct' => 'must have misunderstood',
            'options' => [
                'must have misunderstood',
                'might have misunderstood',
                "can't have misunderstood",
            ],
        ],
        [
            'prompt'  => "A: What is she doing? B: I don't know. She . . . . . . (sleep).",
            'correct' => 'She might be sleeping.',
            'options' => [
                'She must be sleeping.',
                'She might be sleeping.',
                'She might sleep.',
                'She must sleep.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])