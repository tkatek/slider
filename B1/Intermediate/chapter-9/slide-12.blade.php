<?php
$content = [
    'type' => 'questions_only',

    'title'    => 'Practice 4',
    'subtitle' => 'Choose the correct relative pronoun.',

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'question_prompt_label'  => 'Choose the correct relative pronoun',

    'questions' => [
        [
            'prompt'  => 'My teacher, .......... always encourages me, is amazing.',
            'correct' => 'who',
            'options' => ['who', 'that', 'which'],
        ],
        [
            'prompt'  => 'The city .......... we visited last summer was beautiful.',
            'correct' => 'which',
            'options' => ['who', 'where', 'which'],
        ],
        [
            'prompt'  => 'The movie .......... we watched was very interesting.',
            'correct' => 'that',
            'options' => ['who', 'that', 'which'],
        ],
        [
            'prompt'  => 'I remember the day .......... I received my first camera.',
            'correct' => 'when',
            'options' => ['when', 'where', 'that'],
        ],
        [
            'prompt'  => 'People .......... work hard often achieve their dreams.',
            'correct' => 'who',
            'options' => ['who', 'which', 'that'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])