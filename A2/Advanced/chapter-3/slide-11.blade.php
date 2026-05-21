<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match each job with the correct action.',
    'left_label' => 'Jobs',
    'right_label' => 'Actions',

    'pairs' => [
        [
            'id' => 'doctor',
            'left' => [
                'type' => 'word',
                'text' => 'Doctor',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Checks patients',
            ],
        ],
        [
            'id' => 'nurse',
            'left' => [
                'type' => 'word',
                'text' => 'Nurse',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Cares for sick people',
            ],
        ],
        [
            'id' => 'teacher',
            'left' => [
                'type' => 'word',
                'text' => 'Teacher',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Teaches students',
            ],
        ],
        [
            'id' => 'police-officer',
            'left' => [
                'type' => 'word',
                'text' => 'Police Officer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Keeps people safe',
            ],
        ],
        [
            'id' => 'firefighter',
            'left' => [
                'type' => 'word',
                'text' => 'Firefighter',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Puts out fires',
            ],
        ],
        [
            'id' => 'farmer',
            'left' => [
                'type' => 'word',
                'text' => 'Farmer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Grows crops',
            ],
        ],
        [
            'id' => 'construction-worker',
            'left' => [
                'type' => 'word',
                'text' => 'Construction Worker',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Builds houses',
            ],
        ],
        [
            'id' => 'postman',
            'left' => [
                'type' => 'word',
                'text' => 'Postman',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Delivers letters',
            ],
        ],
        [
            'id' => 'chef',
            'left' => [
                'type' => 'word',
                'text' => 'Chef',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Cooks meals',
            ],
        ],
    ],

    'right_order' => [
        'teacher',
        'postman',
        'construction-worker',
        'chef',
        'doctor',
        'farmer',
        'firefighter',
        'nurse',
        'police-officer',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])
