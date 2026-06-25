<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => '',
    'activity_title' => 'Match the words (1–6) with the correct meanings (A–F).',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'influencer',
            'left' => [
                'type' => 'word',
                'text' => '1. influencer',
            ],
            'right' => [
                'type' => 'word',
                'text' => "D. a person who affects other people's opinions or choices",
            ],
        ],
        [
            'id' => 'followers',
            'left' => [
                'type' => 'word',
                'text' => '2. followers',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. people who follow an account on social media',
            ],
        ],
        [
            'id' => 'content',
            'left' => [
                'type' => 'word',
                'text' => '3. content',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. videos, photos, posts, and other online material',
            ],
        ],
        [
            'id' => 'audience',
            'left' => [
                'type' => 'word',
                'text' => '4. audience',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. the people who watch or follow someone',
            ],
        ],
        [
            'id' => 'platform',
            'left' => [
                'type' => 'word',
                'text' => '5. platform',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. a social media website or app',
            ],
        ],
        [
            'id' => 'niche',
            'left' => [
                'type' => 'word',
                'text' => '6. niche',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. a special area of interest',
            ],
        ],
    ],

    'right_order' => [
        'niche',
        'followers',
        'content',
        'influencer',
        'platform',
        'audience',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])