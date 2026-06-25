<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match the words (1–6) with their meanings (A–F).',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'influence',
            'left' => [
                'type' => 'word',
                'text' => '1. Influence',
            ],
            'right' => [
                'type' => 'word',
                'text' => "C. To affect someone's decisions or behavior",
            ],
        ],
        [
            'id' => 'persuade',
            'left' => [
                'type' => 'word',
                'text' => '2. Persuade',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. To convince someone to do or believe something',
            ],
        ],
        [
            'id' => 'audience',
            'left' => [
                'type' => 'word',
                'text' => '3. Audience',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. The group of people who see, hear, or read a message',
            ],
        ],
        [
            'id' => 'consumer',
            'left' => [
                'type' => 'word',
                'text' => '4. Consumer',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. A person who buys products or services',
            ],
        ],
        [
            'id' => 'ethical',
            'left' => [
                'type' => 'word',
                'text' => '5. Ethical',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. Morally right and fair',
            ],
        ],
        [
            'id' => 'transparent',
            'left' => [
                'type' => 'word',
                'text' => '6. Transparent',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. Open and honest',
            ],
        ],
    ],

    'right_order' => [
        'transparent',
        'consumer',
        'influence',
        'persuade',
        'audience',
        'ethical',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])