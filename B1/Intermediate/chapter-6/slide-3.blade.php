<?php
$content = [

    'title' => 'Practice 1: Warm up',
    'subtitle' => '',
    'activity_title' => 'Match the word with its definition',
    'left_label' => 'Definitions',
    'right_label' => 'Words',

    'pairs' => [
        [
            'id' => 'nano-influencers',
            'left' => [
                'type' => 'word',
                'text' => '1. have fewer than 1,000 followers.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. Nano influencers',
            ],
        ],
        [
            'id' => 'mega-influencers',
            'left' => [
                'type' => 'word',
                'text' => '2. have more than one million followers.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'h. Mega influencers',
            ],
        ],
        [
            'id' => 'macro-influencers',
            'left' => [
                'type' => 'word',
                'text' => '3. have between 40,000 and one million followers.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. Macro influencers',
            ],
        ],
        [
            'id' => 'micro-influencers',
            'left' => [
                'type' => 'word',
                'text' => '4. have between 1,000 and 40,000 followers.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. Micro influencers',
            ],
        ],
        [
            'id' => 'promote',
            'left' => [
                'type' => 'word',
                'text' => '5. to advertise or support something.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. promote',
            ],
        ],
        [
            'id' => 'platform',
            'left' => [
                'type' => 'word',
                'text' => '6. a social media website or app.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. platform',
            ],
        ],
        [
            'id' => 'followers',
            'left' => [
                'type' => 'word',
                'text' => '7. people who follow an account on social media.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. followers',
            ],
        ],
        [
            'id' => 'niche',
            'left' => [
                'type' => 'word',
                'text' => '8. a special area of interest.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. niche',
            ],
        ],
    ],

    'right_order' => [
        'macro-influencers',
        'followers',
        'promote',
        'nano-influencers',
        'niche',
        'micro-influencers',
        'platform',
        'mega-influencers',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])