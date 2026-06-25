<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 6',
    'subtitle' => 'A good friend is someone who . . . . . . ',
    'question_prompt_label' => 'Read and choose True or False',
    'questions' => [
        [
            'emoji' => '🤝',
            'prompt' => 'Friends are trustworthy.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '💔',
            'prompt' => 'Friends hurt your feelings.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '👥',
            'prompt' => 'Friends are cooperative.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],

        [
            'emoji' => '🫶',
            'prompt' => 'Friends are forgiving.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],

        [
            'emoji' => '🙋',
            'prompt' => 'Friends help each other.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '🔒',
            'prompt' => 'Friends could not trust each other.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '💙',
            'prompt' => 'Friends are kind to each other.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '🧩',
            'prompt' => 'Friends are not helping each other.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '😠',
            'prompt' => 'Friends are rude to each other.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],

        [
            'emoji' => '🙉',
            'prompt' => 'Friends are not listening.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'emoji' => '👂',
            'prompt' => 'Friends listen to each other.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])