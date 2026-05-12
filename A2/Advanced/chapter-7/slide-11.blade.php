<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the problem with the solution.',
    'left_label' => 'Problems',
    'right_label' => 'Solutions',

    'pairs' => [
        [
            'id' => 'team-not-motivated',
            'left' => [
                'type' => 'word',
                'text' => '1. The team is not motivated.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. Give workers a new challenge.',
            ],
        ],
        [
            'id' => 'repetitive-tasks',
            'left' => [
                'type' => 'word',
                'text' => '2. Workers do repetitive tasks every week.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. Let them work on special projects.',
            ],
        ],
        [
            'id' => 'reports',
            'left' => [
                'type' => 'word',
                'text' => '3. Employees write reports every Friday.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. Lower the target defect rate to 0.7%.',
            ],
        ],
        [
            'id' => 'job-value',
            'left' => [
                'type' => 'word',
                'text' => '4. Workers do not understand their job’s value.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. Explain why quality is important.',
            ],
        ],
        [
            'id' => 'no-feedback',
            'left' => [
                'type' => 'word',
                'text' => '5. The manager does not give feedback.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. Send a thank-you email.',
            ],
        ],
    ],

    'right_order' => [
        'team-not-motivated',
        'job-value',
        'no-feedback',
        'repetitive-tasks',
        'reports',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])
