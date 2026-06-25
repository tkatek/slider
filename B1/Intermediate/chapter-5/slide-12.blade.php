<?php
$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => '',
    'instruction' => '',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm'   => 2,
            'md'   => 3,
            'lg'   => 3,
        ],
    ],

    'items' => [
        'Why do influencers have such an influence over people?',
        'What responsibilities do influencers have towards their audience?',
        'Have you ever unfollowed any influencer? Why?',
        'Do influencers affect your decision when buying any product?',
        'Do you consider becoming an influencer one day?',
    ],
];
?>

@include("slider.game.warming-up", ['content' => $content])