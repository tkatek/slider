<?php
$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Choose the correct answer',
    'type'     => 'audio',

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'questions' => [
        [
            'prompt'  => 'Miranda ____________ at the cinema last Friday.',
            'correct' => 'was',
            'options' => [
                'was',
                'were',
                "wasn't",
                "weren't",
            ],
        ],
        [
            'prompt'  => 'We ___________ very hungry yesterday morning.',
            'correct' => 'were',
            'options' => [
                'were',
                'was',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => '_______ Tom and George at the beach last Saturday?',
            'correct' => 'were',
            'options' => [
                'was',
                'were',
                "wasn't",
                "weren't",
            ],
        ],
        [
            'prompt'  => "It ___________ a beautiful day. It was gray and rainy. I didn't like it.",
            'correct' => "wasn't",
            'options' => [
                'were',
                'was',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => 'You ____________ late for school yesterday. Where were you?',
            'correct' => 'were',
            'options' => [
                'was',
                'were',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => 'I ____________ at the supermarket with my mum.',
            'correct' => 'was',
            'options' => [
                'was',
                'were',
                "wasn't",
                "weren't",
            ],
        ],
        [
            'prompt'  => '____________ they good friends?',
            'correct' => 'were',
            'options' => [
                'were',
                'was',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => "Maddie ____________ in her room at 9 o'clock yesterday. She went to school.",
            'correct' => "wasn't",
            'options' => [
                'was',
                'were',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => '____________ your brother at the bookshop yesterday evening?',
            'correct' => 'was',
            'options' => [
                'were',
                'was',
                "weren't",
                "wasn't",
            ],
        ],
        [
            'prompt'  => '____________ the boys in the garden last year?',
            'correct' => 'were',
            'options' => [
                "wasn't",
                "weren't",
                'were',
                'was',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])