<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Sound more natural and fluent in spoken English',
        ],
        [
            'label' => '',
            'text'  => 'Identify common "translated" sentences and fix them',
        ],
        [
            'label' => '',
            'text'  => 'Use native-like expressions instead of literal translations',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])