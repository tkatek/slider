<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Practice 4',
    'subtitle' => 'Choose the matching date',
    'question_prompt_label' => 'Choose the correct date that matches the numbers',

    'questions'=> [
        [
            'emoji'   => '🎂',
            'prompt'  => '09/02',
            'correct' => 'on the ninth of February',
            'options' => [
                'on the second of September',
                'on the ninth of July',
                'on the ninth of February',
            ],
        ],
        [
            'emoji'   => '🎂',
            'prompt'  => '12/6',
            'correct' => 'on the twelfth of June',
            'options' => [
                'on the tenth of July',
                'on the twelve of June',
                'on the twelfth of June',
            ],
        ],
        [
            'emoji'   => '🎂',
            'prompt'  => '30/05',
            'correct' => 'on the thirtieth of May',
            'options' => [
                'on the thirtieth of March',
                'on the thirtieth of May',
                'on the thirty of May',
            ],
        ],
        [
            'emoji'   => '🎂',
            'prompt'  => '05/08',
            'correct' => 'on the fifth of August',
            'options' => [
                'on the fifth of August',
                'on the eighth of May',
                'on the fifth of May',
            ],
        ],
        [
            'emoji'   => '🎂',
            'prompt'  => '21/04',
            'correct' => 'on the twenty-first of April',
            'options' => [
                'on the twenty-first of April',
                'on the twenty one of April',
                'on the fourth of April',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
