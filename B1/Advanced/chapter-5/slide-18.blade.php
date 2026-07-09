<?php

$content = [
    'title' => 'Task 1',
    'subtitle' => '',
    'activity_title' => 'Match the words with definitions',
    'left_label' => 'Words',
    'right_label' => 'Definitions',

    'pairs' => [
        [
            'id' => 'deforestation',
            'left' => [
                'type' => 'word',
                'text' => '1. Deforestation',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. The cutting down of trees on a large scale, harming the environment',
            ],
        ],
        [
            'id' => 'pollution',
            'left' => [
                'type' => 'word',
                'text' => '2. Pollution',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. The presence of harmful substances in the environment, affecting air, water, or land',
            ],
        ],
        [
            'id' => 'biodiversity',
            'left' => [
                'type' => 'word',
                'text' => '3. Biodiversity',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. The variety of plant and animal life in a particular area',
            ],
        ],
        [
            'id' => 'recycle',
            'left' => [
                'type' => 'word',
                'text' => '4. Recycle',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. The process of treating used materials to make them reusable',
            ],
        ],
        [
            'id' => 'sustainable',
            'left' => [
                'type' => 'word',
                'text' => '5. Sustainable',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. Using natural resources in a way that does not harm the future',
            ],
        ],
    ],

    'right_order' => [
        'recycle',
        'deforestation',
        'biodiversity',
        'pollution',
        'sustainable',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])