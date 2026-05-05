<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read & Choose (True or False)',
    'audio'           => '',
    'reading_title'   => 'Chocolate Consultant',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "If you love chocolate, this can be a fun job. A chocolate consultant works with chocolate. You can work for a big company or a small company.",
        "Some companies make special types of chocolate. To do this job, you need to love chocolate. You also need to learn about different kinds of chocolate.",
        "You can:",
        "help people choose chocolate",
        "give advice about chocolate",
        "organise chocolate-tasting events",
    ],

    'questions_title' => 'Read & write (True or False):',

    'questions' => [
        [
            'prompt'  => 'A chocolate consultant works with chocolate.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'You can only work for a big company.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'You need to love chocolate for this job.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'A chocolate consultant helps people choose chocolate.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'This job has nothing to do with chocolate tasting.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])