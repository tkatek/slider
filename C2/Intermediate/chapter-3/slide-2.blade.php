<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Open a bank account and ask questions confidently',
        ],
        [
            'label' => '',
            'text'  => 'Explain personal information politely and clearly',
        ],
        [
            'label' => '',
            'text'  => 'Understand banking procedures and requirements',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])