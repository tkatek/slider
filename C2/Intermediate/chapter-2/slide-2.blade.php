<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Report issues or delays politely and clearly',
        ],
        [
            'label' => '',
            'text'  => 'Ask for help or clarification in complex situations',
        ],
        [
            'label' => '',
            'text'  => 'Use advanced phrases to sound natural and confident',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])