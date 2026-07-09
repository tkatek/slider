<?php

$content = [

    'title' => 'Practice 2',
    'subtitle' => 'Match the verbs!',
    'activity_title' => 'Match the verbs in Column A with their meanings in Column B.',
    'left_label' => 'Column A – Verbs',
    'right_label' => 'Column B – Meanings',

    'pairs' => [
        [
            'id' => 'reduce',
            'left' => [
                'type' => 'word',
                'text' => '1. reduce',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. to make something smaller in amount.',
            ],
        ],
        [
            'id' => 'trap',
            'left' => [
                'type' => 'word',
                'text' => '2. trap',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. to catch and keep something inside.',
            ],
        ],
        [
            'id' => 'shift',
            'left' => [
                'type' => 'word',
                'text' => '3. shift',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. to move gradually from one thing to another.',
            ],
        ],
        [
            'id' => 'prioritize',
            'left' => [
                'type' => 'word',
                'text' => '4. prioritize',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. to regard something as more important than other things.',
            ],
        ],
        [
            'id' => 'release',
            'left' => [
                'type' => 'word',
                'text' => '5. release',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. to let something out.',
            ],
        ],
        [
            'id' => 'rise',
            'left' => [
                'type' => 'word',
                'text' => '6. rise',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. to go up.',
            ],
        ],
        [
            'id' => 'adapt',
            'left' => [
                'type' => 'word',
                'text' => '7. adapt',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. to adjust to new conditions.',
            ],
        ],
    ],

    'right_order' => [
        'trap',
        'adapt',
        'shift',
        'rise',
        'prioritize',
        'reduce',
        'release',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])