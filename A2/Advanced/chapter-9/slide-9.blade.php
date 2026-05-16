<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the word with its definition:',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'imitate',
            'left' => [
                'type' => 'word',
                'text' => '1. imitate',
            ],
            'right' => [
                'type' => 'word',
                'text' => "d. copy someone’s speech or actions",
            ],
        ],
        [
            'id' => 'consistent',
            'left' => [
                'type' => 'word',
                'text' => '2. consistent',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. doing something regularly',
            ],
        ],
        [
            'id' => 'native-speaker',
            'left' => [
                'type' => 'word',
                'text' => '3. native speaker',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. a person who speaks a language from birth',
            ],
        ],
        [
            'id' => 'journal',
            'left' => [
                'type' => 'word',
                'text' => '4. journal',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. a notebook for regular writing',
            ],
        ],
        [
            'id' => 'pronunciation',
            'left' => [
                'type' => 'word',
                'text' => '5. pronunciation',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. the way words are spoken',
            ],
        ],
    ],

    'right_order' => [
        'pronunciation',
        'journal',
        'consistent',
        'imitate',
        'native-speaker',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])