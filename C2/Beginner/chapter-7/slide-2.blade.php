<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Sound confident even when unsure.',
        ],
        [
            'label' => '',
            'text'  => 'Use language to buy time while thinking.',
        ],
        [
            'label' => '',
            'text'  => 'Avoid nervous or weak expressions.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])