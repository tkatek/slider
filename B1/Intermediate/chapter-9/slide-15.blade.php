<?php
$content = [
    'type' => 'questions_only',

    'title'    => 'Practice 7',
    'subtitle' => 'Choose the correct relative pronoun to complete each sentence.',

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'question_prompt_label'  => 'Choose the correct relative pronoun',

    'questions' => [
        [
            'prompt'  => 'The people .......... inspired me the most were my parents.',
            'correct' => 'who',
            'options' => ['which', 'who', 'where'],
        ],
        [
            'prompt'  => 'I read a book .......... changed the way I think about the world.',
            'correct' => 'which',
            'options' => ['who', 'which', 'where'],
        ],
        [
            'prompt'  => 'My parents are people .......... always support and encourage me.',
            'correct' => 'that',
            'options' => ['that', 'where', 'when'],
        ],
        [
            'prompt'  => 'I enjoy visiting places .......... I can learn about different cultures.',
            'correct' => 'where',
            'options' => ['which', 'where', 'who'],
        ],
        [
            'prompt'  => 'There was a time .......... I wanted to become an architect.',
            'correct' => 'when',
            'options' => ['when', 'where', 'who'],
        ],
        [
            'prompt'  => 'The biography .......... I read about Steve Jobs was very inspiring.',
            'correct' => 'which',
            'options' => ['who', 'which', 'where'],
        ],
        [
            'prompt'  => 'People .......... work hard usually achieve their goals.',
            'correct' => 'who',
            'options' => ['who', 'where', 'which'],
        ],
        [
            'prompt'  => 'Photography is a hobby .......... helps me notice small details.',
            'correct' => 'which',
            'options' => ['who', 'which', 'where'],
        ],
        [
            'prompt'  => 'I remember the day .......... I first became interested in design.',
            'correct' => 'when',
            'options' => ['when', 'where', 'which'],
        ],
        [
            'prompt'  => 'The lessons .......... I learned from biographies are very valuable.',
            'correct' => 'which',
            'options' => ['who', 'which', 'where'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])