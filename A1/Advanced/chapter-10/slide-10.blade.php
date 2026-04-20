<?php
$content = [
    'page_title'     => 'Practice 3',
    'title'          => 'Practice 3',
    'compact_layout' => true,
    'subtitle'       => 'Complete the sentences with the correct word (am/is/are)',

    'questions' => [
        [
            'segments' => [
                'I ',
                ['answer' => 'am', 'options' => ['am', 'is', 'are']],
                ' looking at some pictures.',
            ],
        ],
        [
            'segments' => [
                'I ',
                ['answer' => 'am', 'options' => ['am', 'is', 'are']],
                ' playing tennis.',
            ],
        ],
        [
            'segments' => [
                'My dad and I ',
                ['answer' => 'are', 'options' => ['am', 'is', 'are']],
                ' not playing tennis, we ',
                ['answer' => 'are', 'options' => ['am', 'is', 'are']],
                ' boxing.',
            ],
        ],
        [
            'segments' => [
                'My sister ',
                ['answer' => 'is', 'options' => ['am', 'is', 'are']],
                ' playing golf.',
            ],
        ],
        [
            'segments' => [
                'You ',
                ['answer' => 'are', 'options' => ['am', 'is', 'are']],
                ' playing football.',
            ],
        ],
        [
            'segments' => [
                'I ',
                ['answer' => 'am', 'options' => ['am', 'is', 'are']],
                ' not playing football, I ',
                ['answer' => 'am', 'options' => ['am', 'is', 'are']],
                ' playing cricket.',
            ],
        ],
        [
            'segments' => [
                'My brothers ',
                ['answer' => 'are', 'options' => ['am', 'is', 'are']],
                ' swimming.',
            ],
        ],
        [
            'segments' => [
                'My dad and I ',
                ['answer' => 'are', 'options' => ['am', 'is', 'are']],
                ' having a race.',
            ],
        ],
        [
            'segments' => [
                'I ',
                ['answer' => 'am', 'options' => ['am', 'is', 'are']],
                ' winning and he ',
                ['answer' => 'is', 'options' => ['am', 'is', 'are']],
                ' losing.',
            ],
        ],
        [
            'segments' => [
                'Sammy ',
                ['answer' => 'is', 'options' => ['am', 'is', 'are']],
                ' not playing real sports, he ',
                ['answer' => 'is', 'options' => ['am', 'is', 'are']],
                ' playing games on a computer.',
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
