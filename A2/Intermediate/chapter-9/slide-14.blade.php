<?php

$content = [
    'type'            => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and choose true or false',
    'audio'           => '',
    'reading_title'   => 'A Busy Week',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => "Next week is very busy for me! On Monday, we’re going to the science museum with school. On Tuesday, our grandparents are visiting us. On Wednesday, I’m playing tennis. On Thursday, my sister is taking me shopping. On Friday, I’m staying at home!",

    'questions' => [
        [
            'prompt'  => "She's very busy next week.",
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => "On Monday, she's going to the art museum.",
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'On Tuesday, her aunt and uncle are visiting.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'On Thursday, her sister is taking her to the cinema.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => "On Friday, she's staying at home.",
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])