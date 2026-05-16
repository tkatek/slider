<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Ask about shipping options, prices, and delivery times',
        ],
        [
            'label' => '',
            'text'  => 'Explain package details clearly and politely',
        ],
        [
            'label' => '',
            'text'  => 'Handle delays or problems effectively',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])