<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Participate confidently in structured debates.',
        ],
        [
            'label' => '',
            'text'  => 'Defend their opinions under pressure.',
        ],
        [
            'label' => '',
            'text'  => 'Respond to opposing arguments strategically.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])