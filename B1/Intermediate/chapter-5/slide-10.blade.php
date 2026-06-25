<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the words in Column A with the words in Column B.',
    'left_label' => 'Column A',
    'right_label' => 'Column B',

    'pairs' => [
        [
            'id' => 'create-content',
            'left' => [
                'type' => 'word',
                'text' => '1. create',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. content',
            ],
        ],
        [
            'id' => 'gain-followers',
            'left' => [
                'type' => 'word',
                'text' => '2. gain',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. followers',
            ],
        ],
        [
            'id' => 'build-a-connection',
            'left' => [
                'type' => 'word',
                'text' => '3. build a',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'g. connection',
            ],
        ],
        [
            'id' => 'build-an-audience',
            'left' => [
                'type' => 'word',
                'text' => '4. build an',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. audience',
            ],
        ],
        [
            'id' => 'social-media-influencer',
            'left' => [
                'type' => 'word',
                'text' => '5. social media',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. influencer',
            ],
        ],
        [
            'id' => 'promote-products',
            'left' => [
                'type' => 'word',
                'text' => '6. promote',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. products',
            ],
        ],
        [
            'id' => 'influence-choices',
            'left' => [
                'type' => 'word',
                'text' => '7. influence',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'h. choices',
            ],
        ],
        [
            'id' => 'follow-trends',
            'left' => [
                'type' => 'word',
                'text' => '8. follow',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. trends',
            ],
        ],
    ],

    'right_order' => [
        'promote-products',
        'create-content',
        'gain-followers',
        'build-an-audience',
        'social-media-influencer',
        'follow-trends',
        'build-a-connection',
        'influence-choices',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])