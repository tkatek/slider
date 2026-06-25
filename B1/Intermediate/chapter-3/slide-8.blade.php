<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => 'Match the Vocabulary Activity',
    'activity_title' => 'Match the words with their meanings.',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'autonomous',
            'left' => [
                'type' => 'word',
                'text' => 'A. Autonomous',
            ],
            'right' => [
                'type' => 'word',
                'text' => '2. Able to work without human help.',
            ],
        ],
        [
            'id' => 'monitor',
            'left' => [
                'type' => 'word',
                'text' => 'B. monitor',
            ],
            'right' => [
                'type' => 'word',
                'text' => '3. to watch or check something regularly.',
            ],
        ],
        [
            'id' => 'surveillance',
            'left' => [
                'type' => 'word',
                'text' => 'C. Surveillance',
            ],
            'right' => [
                'type' => 'word',
                'text' => '1. Watching people or activities carefully',
            ],
        ],
        [
            'id' => 'deepfake',
            'left' => [
                'type' => 'word',
                'text' => 'D. Deepfake',
            ],
            'right' => [
                'type' => 'word',
                'text' => '4. A fake image, video, or audio created using AI',
            ],
        ],
        [
            'id' => 'manipulate',
            'left' => [
                'type' => 'word',
                'text' => 'E. Manipulate',
            ],
            'right' => [
                'type' => 'word',
                'text' => '6. To control or influence someone or something',
            ],
        ],
        [
            'id' => 'privacy',
            'left' => [
                'type' => 'word',
                'text' => 'F. privacy',
            ],
            'right' => [
                'type' => 'word',
                'text' => '5. the right to keep personal information private',
            ],
        ],
    ],

    'right_order' => [
        'surveillance',
        'autonomous',
        'monitor',
        'deepfake',
        'privacy',
        'manipulate',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])