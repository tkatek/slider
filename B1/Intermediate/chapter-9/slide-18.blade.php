<?php
$content = [
    'type' => 'questions_only',

    'title'    => 'Practice 9',
    'subtitle' => 'Choose the correct relative pronoun: who / which / that',

    'question_prompt_label'  => 'Choose the correct relative pronoun',

    'questions' => [
        [
            'prompt'  => 'William Shakespeare is a writer .......... influenced English literature.',
            'correct' => 'who',
            'options' => ['who', 'which', 'that'],
        ],
        [
            'prompt'  => 'Romeo and Juliet is a play .......... is still famous today.',
            'correct' => 'which',
            'options' => ['who', 'which', 'that'],
        ],
        [
            'prompt'  => 'He wrote plays .......... are performed all over the world.',
            'correct' => 'which',
            'options' => ['who', 'which', 'that'],
        ],
        [
            'prompt'  => 'Shakespeare is a man .......... changed drama forever.',
            'correct' => 'who',
            'options' => ['who', 'which', 'that'],
        ],
        [
            'prompt'  => 'His works are things .......... students still study in schools.',
            'correct' => 'that',
            'options' => ['who', 'which', 'that'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])