<?php
$content = [
    'page_title' => 'Can you do this?',
    'title'      => 'Can you do this?',
    'subtitle'   => 'Choose the correct subject pronouns or possessive adjectives to complete the sentences.',
    'questions'  => [
        [
            'img'      => '🏠',
            'segments' => [
                'Harry is ',
                ['answer' => 'my', 'wrong' => 'I'],
                ' friend. ',
                ['answer' => 'He', 'wrong' => 'His'],
                ' has a nice house.',
            ],
        ],
        [
            'img'      => '🐶',
            'segments' => [
                ['answer' => 'They',  'wrong' => 'Their'],
                ' are very happy with ',
                ['answer' => 'their', 'wrong' => 'they'],
                ' new dog.',
            ],
        ],
        [
            'img'      => '🐾',
            'segments' => [
                'We love ',
                ['answer' => 'our', 'wrong' => 'we'],
                ' little dog.',
            ],
        ],
        [
            'img'      => '🍳',
            'segments' => [
                ['answer' => 'He',  'wrong' => 'His'],
                ' wants ',
                ['answer' => 'his', 'wrong' => 'he'],
                ' breakfast.',
            ],
        ],
        [
            'img'      => '🏡',
            'segments' => [
                'Susan lives on ',
                ['answer' => 'my',  'wrong' => 'I'],
                ' street. ',
                ['answer' => 'Her', 'wrong' => 'His'],
                ' house is very near.',
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
