<?php
$content = [

    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the Collocations',
    'left_label' => 'Collocations',
    'right_label' => 'Options',

    'pairs' => [
        [
            'id' => 'build',
            'left' => [
                'type' => 'word',
                'text' => '1. Build',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. trust',
            ],
        ],
        [
            'id' => 'create',
            'left' => [
                'type' => 'word',
                'text' => '2. Create',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. emotions',
            ],
        ],
        [
            'id' => 'share',
            'left' => [
                'type' => 'word',
                'text' => '3. Share',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. information',
            ],
        ],
        [
            'id' => 'influence',
            'left' => [
                'type' => 'word',
                'text' => '4. Influence',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. decisions',
            ],
        ],
        [
            'id' => 'promote',
            'left' => [
                'type' => 'word',
                'text' => '5. Promote',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. products',
            ],
        ],
    ],

    'right_order' => [
        'promote',
        'build',
        'create',
        'influence',
        'share',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])