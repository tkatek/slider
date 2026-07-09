<?php
$content = [

    'title'          => 'Practice 4',
    'subtitle'       => 'Read each situation and match it with the best advice',
    'activity_title' => '',
    'left_label'     => 'Situations',
    'right_label'    => 'Advice',

    'pairs' => [
        [
            'id' => 'classmate_upset',
            'left' => [
                'type' => 'word',
                'text' => '1. A classmate is sitting alone and looks upset.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. You should ask if they are okay.',
            ],
        ],
        [
            'id' => 'mistake_at_work',
            'left' => [
                'type' => 'word',
                'text' => '2. Someone makes a mistake at work.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. You shouldn’t judge them immediately.',
            ],
        ],
        [
            'id' => 'elderly_bags',
            'left' => [
                'type' => 'word',
                'text' => '3. An elderly person is carrying heavy bags.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. You should offer to help.',
            ],
        ],
        [
            'id' => 'friend_worried',
            'left' => [
                'type' => 'word',
                'text' => '4. Your friend is worried about a problem.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. You should be there for them.',
            ],
        ],
        [
            'id' => 'treated_unfairly',
            'left' => [
                'type' => 'word',
                'text' => '5. Someone is being treated unfairly.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. You should support them.',
            ],
        ],
    ],

    'right_order' => [
        'elderly_bags',
        'treated_unfairly',
        'classmate_upset',
        'friend_worried',
        'mistake_at_work',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])